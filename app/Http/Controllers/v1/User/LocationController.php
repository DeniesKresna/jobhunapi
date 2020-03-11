<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\ApiController;
use App\Models\Location;
use App\Models\AdsCampaignLocation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class LocationController extends ApiController
{

    /**
     * Accessing Location Data.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request){
        $location = Location::where('id','>',0);
        if($request->has('name')){
            $location = $location->where('name','like','%'.$request->name.'%');
        }
        $data = [
            "locations"=> $location->get()
        ];
        return self::success_responses($data);
    }

    public function show($id){
    	$location = Location::findOrFail($id);
    	if($location)
    		return self::success_responses($location);
    	else
            return self::error_responses("Unkown error");
    }
}