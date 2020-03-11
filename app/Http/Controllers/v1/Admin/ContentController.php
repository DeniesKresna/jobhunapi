<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\ApiController;
use App\Models\Campaign;
use App\Models\Content;
use App\Models\CampaignLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Validator;

class ContentController extends ApiController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $page = !empty($request->page)?$request->page:1;
        $page_size = !empty($request->page_size)?$request->page_size:10;
        $datas = Content::where('id','>',0);
        if($request->has('customer_id')){
            $datas = $datas->where('customer_id',$request->user_id);
        }
        $datas = $datas->with(['customer'])->orderBy("id","desc")->paginate($page_size,["*"],"page",$page);
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
        $data = Content::findOrFail($id);
        return self::success_responses($data->load(['customer']));
    }

    public function destroy($id){
        $res = Content::findOrFail($id);
        $last_file = $res->file_path;
        @unlink(base_upload_dir().$last_file);
        $res->campaigns()->detach();
        $res->playlists()->detach();
        $res->delete();
        return self::success_responses();
    }
}