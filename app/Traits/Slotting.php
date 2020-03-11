<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;
use App\Models\Slot;
use Datetime;

trait Slotting{
	public function get_available_slot($start_date, $end_date, $locations, $device_types){
		$start_date = date("Y-m-d H:i:s",strtotime($start_date));
                $end_date = date("Y-m-d H:i:s",strtotime($end_date));

                //init query to filter device based on user filter parameter
                $device_link_lines = DB::table('device_lines as dl')
                                ->join('devices as d', 'd.id','=','dl.device_id')
                                ->whereIn('d.device_type_id',$device_types)
                                ->whereIn('d.location_id',$locations);

                //use the query to get the total layout box of the filtered devices
                $device_lines_total_box = (clone $device_link_lines)->join('layouts as l','dl.layout_id','=','l.id')
                                        ->join('layout_boxes as lb','lb.layout_id','=','l.id')
                                        ->where('lb.enable_slotting',1)
                                        ->count('lb.id');

                //get total slots used by the filtered devices on spesific time defined by user
                $taken_slots = $device_link_lines->join('slots as s','s.device_line_id','=','dl.id')
                                ->where('s.start_time','>=',$start_date)
                                ->where('s.end_time','<=',$end_date)
                                ->select(DB::raw('count(s.id) as taken_slot, dl.*'))
                                ->groupBy('dl.device_id')->orderBy('taken_slot')
                                ->get();

                //converting the difference between start and date to seconds
                //why not use timestamp bcoz timestamp use second from '70 and i'm affraid of the accuracy
                $start_date_dt = new Datetime($start_date);
                $end_date_dt = new Datetime($end_date);

                $diff_time = $start_date_dt->diff($end_date_dt);
                $diff_seconds = $diff_time->days*24*60*60;
                $diff_seconds += $diff_time->h*60*60;
                $diff_seconds += $diff_time->i*60;
                $diff_seconds += $diff_time->s;

                //available slots is total slots available from the filtered devices minus the slot has been used by that
                //filtered device
                return (intdiv($diff_seconds,15)*intval($device_lines_total_box))-array_sum(array_column($taken_slots->toArray(), 'taken_slot'));
	}

        public function delete_slot_by_campaign_id($campaign_id){
                Slot::where('campaign_id',$campaign_id)->delete();
        }
}