<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\ApiController;
use App\Models\Campaign;
use App\Models\CampaignDeviceType;
use App\Models\Content;
use App\Models\Location;
use App\Models\DeviceType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Traits\Slotting;
use App\Models\Slot;
use Illuminate\Support\Facades\DB;

class CampaignController extends ApiController
{
    use Slotting;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $auth = $request->get('auth');
        $page = !empty($request->page)?$request->page:1;
        $page_size = !empty($request->page_size)?$request->page_size:10;
        $datas = Campaign::where('customer_id','=',$auth->user->id);
        if($request->has('status')){
            $datas = $datas->where('status',$request->status);
        }
        $datas = $datas->orderBy("id","desc")->with('customer', 'verificator', 'locations', 'contents', 'device_types')->paginate($page_size,["*"],"page",$page);

        $data = [
            "total"=>$datas->total(),
            "page_size"=>$datas->perPage(),
            "page"=>$datas->currentPage(),
            "result"=>$datas->items(),
            "previous_page_url" => $datas->previousPageUrl(),
            "next_page_url" => $datas->nextPageUrl(),
        ];
        return self::success_responses($data);
    }

    public function show($id)
    {
        $session_id = request()->get('auth')->user->id;
        $data = Campaign::withTrashed()->with("customer","verificator","locations","contents","device_types")->findOrFail($id);
        if($data->customer_id == $session_id)
            return self::success_responses($data);
        else
            return self::error_responses("This Campaign is not belonging to you");
        
    }

    public function store(Request $request){
        $datas = $request->all();
        $datas["status"] = "0";
        $session_id = $request->get('auth')->user->id;
        $datas["customer_id"] = $session_id;

        $validator = Validator::make($datas, rules_lists(__CLASS__, __FUNCTION__));
        if($validator->fails()) return self::error_responses($validator->messages());

        //blank option on locations and device_types
        if($request->locations){
            if(is_array($request->locations)){
                if(count($request->locations) == 0)
                    $locations = Location::where('id' ,'>' ,0)->pluck('id')->toArray();
                else
                    $locations = $request->locations;
            }
            else
                $locations = Location::where('id' ,'>' ,0)->pluck('id')->toArray();
        }
        else
            $locations = Location::where('id' ,'>' ,0)->pluck('id')->toArray();

        if($request->device_types){
            if(is_array($request->device_types)){
                if(count($request->device_types) == 0)
                    $device_types = DeviceType::where('id','>',0)->pluck('id')->toArray();
                else
                    $device_types = $request->device_types;
            }
            else
                $device_types = DeviceType::where('id','>',0)->pluck('id')->toArray();
        }
        else
            $device_types = DeviceType::where('id','>',0)->pluck('id')->toArray();

        $medias = $request->medias;
        $new_medias = Input::file('new_medias');
        
        if((count($medias) == 0) && !$new_medias){
            return self::error_responses("Need minimum 1 media");
        }
        //set medias to empty array on null medias.
        //i dont know why in postman if there is media request with null data, the laravel array
        //has one element with null data inside it. so i reset the array if first element is null.
        //i cant ignore with uncheck the request in postman coz the frontend send it.
        if(!$medias[0])
            $medias = [];

        $res = Campaign::create($datas);
        if ($res){
            //insert new medias
            if (!empty($new_medias))
                $medias = to_object(array_merge(to_array($medias),to_array($this->insert_media($new_medias,$datas["customer_id"],$datas['file_name'],$datas['file_description']))));

            $res->device_types()->attach($device_types);
            $res->locations()->attach($locations);
            $res->contents()->sync($medias);

            $success = $this->distribute_slot_asertif_hourly($res->load(['contents','device_types','locations']));
            if($success){
                return self::success_responses($res->load("customer","verificator","locations","contents","device_types"));
            }else{
                $resp = $this->destroy($res->id, $request);
                return self::error_responses("Something trouble when distribute the slots");
            }
        } else {
            return self::error_responses("Unknown error");
        }
    }

    public function insert_media($new_medias,$user_id,$file_name,$file_description){
        $inserted = [];
        $i = 1;
        foreach ($new_medias as $key => $new_media){           
            if (!empty($new_media)){
                $upload = upload("/screen/medias/",$new_media, $i);
                $type = file_extension($upload);
                $data['name'] = $file_name[$key];
                $data['description'] = $file_description[$key];
                $data['file_url'] = upload_dir().$upload;
                $data['file_path'] = $upload;
                $tmp = explode("/", $upload);
                $data['file_name'] = end($tmp);
                $data['type'] = file_type($type);
                $data['customer_id'] = $user_id;
                $res = Content::query()->create($data);
                array_push($inserted,$res->id);
                $i++;
            }
        }
        return $inserted;
    }

    public function update($id,Request $request){
        $datas = $request->all();
        $session_id = $request->get('auth')->user->id;

        $validator = Validator::make($datas, rules_lists(__CLASS__, __FUNCTION__));
        if($validator->fails()) return self::error_responses($validator->messages());
        
        $datas = exclude_array($datas,['name']);
        $res = Campaign::findOrFail($id);
        if($res->customer_id == $session_id){
            $res->update($datas);
            if ($res){
                return self::success_responses($res->load("customer","verificator","locations","contents","device_types"));
            } else {
                return self::error_responses("Unknown error");
            }
        }
        else
            return self::error_responses("This Campaign is not belonging to you");
    }

    public function destroy($id, Request $request){
        $session_id = $request->get('auth')->user->id;
        $res = Campaign::withTrashed()->findOrFail($id);
        if($res){
            if($res->customer_id == $session_id){
                if($res->status != 1){
                    $res->locations()->detach();

                    $media_paths = $res->contents()->pluck('file_path');
                    foreach ($media_paths as $media_path) {
                        @unlink(base_upload_dir().$media_path);
                    }
                    $res->contents()->delete();
                    $res->contents()->detach();

                    $res->device_types()->detach();

                    $this->delete_slot_by_campaign_id($res->id);
                    $res->forceDelete();
                    return self::success_responses("Success delete Campaign");
                }
                else
                    return self::error_responses("You cannot delete approved Campaign. Contact Administrator");
            }
            else
                return self::error_responses("This Campaign is not belonging to you");
        }
        else{
            return self::error_responses("Campaign Not Found");
        }
    }

    public function available_slots(Request $request){
        $data = $request->all();

        $available_slot = $this->get_available_slot($data['start_date'],$data['end_date'],$data['locations'],$data['device_types']);

        return self::success_responses($available_slot);
    }
    
    private function distribute_slot_asertif_hourly($data){
        $data = $data->toArray();
        $new_slot_ids = [];
        $base_start_date = date("Y-m-d H:i:s",strtotime($data['start_date']));
        $base_end_date = date("Y-m-d H:i:s",strtotime($data['end_date']));
        $bths = $this->block_time_hourly($base_start_date, $base_end_date);
        if($bths > 0){
            $base_start_date = $bths[0]['st'];
            $base_end_date = $bths[count($bths)-1]['et'];
        }
        $request_slot = $data['slots'];
        $loop_index = 0;
        $contents = array_column($data['contents'], 'id');

        foreach($bths as $bth){
            $start_date = $bth['st'];
            $end_date = $bth['et'];
            /*-------------------------------------------------------------------------------------------------
            | qry all device line where the reference device location and device type depend on campaign request
            */
            $device_type_list = array_column($data['device_types'], 'id');
            $location_list = array_column($data['locations'], 'id');

            $device_link_lines = DB::table('device_lines as dl')
                                    ->join('devices as d', 'd.id','=','dl.device_id')
                                    ->whereIn('d.device_type_id',$device_type_list)
                                    ->whereIn('d.location_id',$location_list);

            $device_lines_filtered = ( clone $device_link_lines )->select('dl.*','dl.id as line_id')->orderBy('dl.id')->get();

            /*-------------------------------------------------------------------------------------------------
            | qry if device line on given time has slot to sort the device line by the largest available slot
            */
            $device_lines_with_slot = $device_link_lines->join('slots as s','s.device_line_id','=','dl.id')
                                ->where('s.start_time','>=',$start_date)
                                ->where('s.end_time','<=',$end_date)
                                ->select(DB::raw('count(s.id) as taken_slot, dl.*, dl.id as line_id'))
                                ->groupBy('dl.device_id')->orderBy('taken_slot')
                                ->get();

            //merge the device lines filtered and devic lines with slot
            $device_lines = $this->merge_model_sequently($device_lines_filtered, $device_lines_with_slot);
            //===================================================================================================
            
            //--------------------------------iterating each device line----------------------------------------
            foreach ($device_lines as $device_line) {
                $line_id = $device_line->line_id;
                /*-----------------------------------------------------------------------------------------------
                | qry layout boxes from given device line
                */
                $layout_boxes = DB::table('layout_boxes as lb')
                                ->join('layouts as l','lb.layout_id','=','l.id')
                                ->where('l.id',$device_line->layout_id)
                                ->where('lb.enable_slotting',1)
                                ->select('lb.id')->get();
                //===============================================================================================
                
                //--------------------------------iterating each layout box-------------------------------------
                foreach($layout_boxes as $layout_box){
                    $layout_box_id = $layout_box->id;
                    $over_time = false;
                    $time_travel = $start_date;
                    //--------------------------------iterating each posible slots-----------------------------------
                    //---- stop if the time travel over the end time parameter or all request slot has been placed---
                    while(!$over_time && $request_slot > 0){

                        /* -----------------------------my alternative code (use slot code)--------------------------
                        $time_code = str_replace(' ','',$time_travel);
                        $time_code = str_replace('-','',$time_code);
                        $time_code = str_replace(':','',$time_code);
                        $code = $device_line->line_id."_".$layout_box->id."_".$time_code;*/
                        //-------------------------------------------------------------------------------------------

                        //check if slot exist in 15 seconds jumping time travel. 
                        $slot = DB::table('slots')->where('start_time',$time_travel)->where('device_line_id',$line_id)
                                    ->where('layout_box_id',$layout_box_id)->first();
                        if(!$slot){
                            //if slot empty, then we can create slot for this slot
                            $slot_data = (array) $device_line;
                            $slot_data['device_line_id'] = $line_id;
                            $slot_data['campaign_id'] = $data['id'];
                            $slot_data['layout_box_id'] = $layout_box_id;
                            $slot_data['start_time'] = $time_travel;
                            $slot_data['end_time'] = date("Y-m-d H:i:s",strtotime($time_travel) + 14);
                            //get the campaign content id based on running loop index
                            $slot_data['content_id'] = $contents[$loop_index % count($contents)];
                            $new_slot = Slot::create($slot_data);
                            if($new_slot){
                                //slot is placed, decrease the slot request amount
                                $request_slot--;
                                $loop_index++;
                                array_push($new_slot_ids,$new_slot->id);
                                if($request_slot < 1){
                                    break 1;
                                }
                            }
                            else{
                                //if new slot failed, i make sure there is something in server
                                //dont forget to delete all slots we have made.
                                Slot::whereIn('id',$new_slot_ids)->delete();
                                return false;
                            }
                        }
                        //time travel jump 15 seconds to be used by the next loop process
                        $time_travel = date("Y-m-d H:i:s",strtotime($time_travel) + 15);

                        if(strtotime($time_travel) >= strtotime($end_date)){
                            $over_time = true;
                        }
                    }
                }//end of iterating layout box
            }//end of iterating device line
        }
        return true;
    }

    private function block_time_hourly($start_date, $end_date){
        $start_date_second = date("s",strtotime($start_date));
        $base_end_date = date("Y-m-d H:i:s",strtotime($end_date));

        //re init the start date too round down at multiple of 15 seconds
        if(intval($start_date_second) > 45){
            $start_date_second = ':45';
        }
        else if(intval($start_date_second) > 30){
            $start_date_second = ':30';
        }
        else if(intval($start_date_second) > 15){
            $start_date_second = ':15';
        }else{
            $start_date_second = ':00';
        }
        $base_start_date = date("Y-m-d H:i",strtotime($start_date)).$start_date_second;

        //get hourly block start date end date
        $interval = 1;
        $base_time_travel = $base_start_date;
        $time_init_list = [];
        while(strtotime($base_time_travel) < strtotime($base_end_date)){
            $tmp['st'] = $base_time_travel;
            $base_time_travel_plus_itv = date("Y-m-d H:00:00",strtotime($base_time_travel.'+'.$interval.' hours'));
            if(strtotime($base_time_travel_plus_itv) >= strtotime($base_end_date)){
                $tmp['et'] = $base_end_date;
            }
            else{
                $tmp['et'] = $base_time_travel_plus_itv;
            }
            array_push($time_init_list, $tmp);
            $base_time_travel = $tmp['et'];
            //return response()->json("btt = ".strtotime($base_time_travel).", bed = ".strtotime($base_end_date));
        }
        return $time_init_list;
    }

    private function merge_model_sequently($models1, $models2){
        $new_array = [];
        //fill new array with model 1 data
        foreach ($models1 as $model1) {
           array_push($new_array, $model1);
        }

        $i=0;
        //check every elemen in new array
        foreach ($new_array as $ary) {
            //that has device identical to model 2 to be deleted.
            foreach ($models2 as $model2) {
                if($ary->device_id == $model2->device_id){
                    unset($new_array[$i]);
                    break 1;
                }
            }
            $i++;
        }
        //then add model 2 to the clean model 1
        foreach ($models2 as $model2) {
            array_push($new_array, $model2);
        }
        return $new_array;
    }
}