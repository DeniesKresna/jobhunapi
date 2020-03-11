<?php

namespace App\Http\Controllers\v1\Device;

use App\Http\Controllers\ApiController;
use App\Models\Device;
use App\Models\DeviceLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class LayoutController extends ApiController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        if($request->has('imei')){
            $imei = $request->imei;
            $device = Device::where('imei',$imei)->first();
            if(!$device){
                return response()->json(['message'=>"no device with the given imei"]);
            }
            
            $time_content = date('Y-m-d H:i:s', strtotime(date("Y-m-d H:00:00").'+1 hour'));
            $time_content_end = date('Y-m-d H:i:s', strtotime($time_content.'+1 hour'));

            //=========================Testing Variable=========================================

            //two line below used for development testing. delete if going to production.
            $time_content = "2020-12-01 00:00:00";
            $time_content_end = "2020-12-01 00:02:00";

            //two line below used for development testing. delete if going to production.
            $time_content = date('Y-m-d H:i:s', strtotime(date("Y-m-d H:00:00")));
            $time_content_end = date('Y-m-d H:i:s', strtotime($time_content.'+1 hour'));
            
            //==================================================================================

            /*----------------------------------------------------------------------------------------
            | qry get all slot where interval is one hour since next hour, where the device id
            | has imei like the imei request and sort by layout box and the start time
            | ------------------------------------------------------------------------------*/
            $slots = DB::table('slots as s')
                        ->join('device_lines as dl','dl.id','=','s.device_line_id')
                        ->join('devices as d','d.id','=','dl.device_id')
                        ->join('layout_boxes as lb','lb.id','=','s.layout_box_id')
                        ->join('layouts as l','l.id','=','lb.layout_id')
                        ->join('contents as c','c.id','=','s.content_id')
                        ->where('s.start_time','>=',$time_content)
                        ->where('s.end_time','<=',$time_content_end)
                        ->where('d.id',$device->id)
                        ->orderBy('s.layout_box_id')->orderBy('s.start_time')
                        ->select('d.*','l.*','lb.*','c.*','s.*','l.name as l_name','l.type as l_type','l.id as l_id','s.id as s_id')
                        ->get();
            //return response()->json($slots);

            $array_list = [];
            $current_layout_box = 0;

            //iterate through the slot
            for ($i=0; $i<count($slots); $i++) {
                //if this is first slot, we initiate the return object
                if($i==0){
                    $array_list['nomorlayout'] = 1;
                    $array_list['layoutname'] = $slots[$i]->l_name;
                    $tmp1['tvid'] = $slots[$i]->imei;
                    $tmp1['layoutid'] = $slots[$i]->l_id;
                    $tmp1['layoutname'] = $slots[$i]->l_name;
                    $tmp1['layouttype'] = $slots[$i]->l_type;
                    $tmp1['totalcolumn'] = 0;
                    $tmp1['totalrow'] = 0;
                    $tmp1['timerlayout'] = $slots[$i]->timeout;
                    $tmp1['timercheck'] = 0;
                    $tmp1['layoutdetail'] = [];
                    $array_list['layout'] = $tmp1;
                }

                if($slots[$i]->layout_box_id > $current_layout_box){
                    $tmp2['idlayout'] = $slots[$i]->layout_box_id;
                    $tmp2['boxno'] = $slots[$i]->box_number;
                    $tmp2['start'] = null;
                    $tmp2['size'] = null;
                    $tmp2['typetemplate_detail'] = $slots[$i]->data_type;
                    $tmp2['publisher_id'] = $slots[$i]->lemma_publisher_id;
                    $tmp2['addunitid'] = $slots[$i]->lemma_ads_unit_id;
                    $tmp2['width'] = $slots[$i]->width;
                    $tmp2['height'] = $slots[$i]->height;
                    $tmp2['alignparentend'] = $slots[$i]->align_parent_end;
                    $tmp2['alignparenttop'] = $slots[$i]->align_parent_bottom;
                    $tmp2['alignparentbottom'] = $slots[$i]->align_parent_bottom;
                    $tmp2['below'] = $slots[$i]->below;
                    $tmp2['rightof'] = $slots[$i]->right_of;
                    $tmp2['leftof'] = $slots[$i]->left_of;
                    $tmp2['fontsize'] = $slots[$i]->font_size;
                    $tmp2['periode'] = $slots[$i]->timeout;
                    $tmp2['sequencemedia'] = [];
                    array_push($array_list['layout']['layoutdetail'],$tmp2);
                    $current_layout_box = $slots[$i]->layout_box_id;
                }

                $layoutdetail_count = count($array_list['layout']['layoutdetail']);

                $tmp3['id'] = $slots[$i]->s_id;
                $tmp3['iddetaillayout'] = $slots[$i]->layout_box_id;
                $tmp3['sequenceno'] = $i;
                $tmp3['idmedia'] = $slots[$i]->content_id;
                $tmp3['typedata'] = $slots[$i]->type;
                $tmp3['filename'] = $slots[$i]->file_name;
                $tmp3['labeltext'] = $slots[$i]->name;
                $tmp3['urldownload'] = $slots[$i]->file_url;
                $tmp3['status'] = "aktif";

                array_push($array_list['layout']['layoutdetail'][$layoutdetail_count-1]['sequencemedia'], $tmp3);
            }
            $arr[0] = $array_list;
            $datas = ["list"=>$arr,"status"=>"ok","wake"=>"07:00","sleep"=>"21:00","timerdownload"=>"900","timerestart"=>120,"maxsizelemma"=>"200","maxpendingdata"=>"75000"];
            return response()->json($datas);
        }
        return response()->json(['message'=>"need Imei as parameter"]);
    }
}