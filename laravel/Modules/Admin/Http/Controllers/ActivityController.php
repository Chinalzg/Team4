<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Models\ActivityType as Type;
use Modules\Admin\Models\Activity as Activitys;

class ActivityController extends Controller
{
	public function activityInsert(Request $request)
	{	
		if($request->isMethod('post')){
			
			$request->validate([
	        'title' => 'required|regex:/\p{Han}/u|between:2,10',
	        'content' => 'required',
	        'start_time' => 'required|date',
	        'end_time' => 'required|date'
    		]);
    		$data = $request->input();
			$data['start_time'] = strtotime($data['start_time']);
			$data['end_time'] = strtotime($data['end_time']);
    		
    		$result = Activitys::activityInsert($data);
    		if($result){
    			return redirect('admin/activityList');
    		}
		}

		$type = Type::getActiveType();
		$goods = Db::table('goods')->get();
		return view("admin::activity.activityInsert",['type' => $type, 'goods' => $goods]);
	}

	public function activityList()
	{
		$activityList = Activitys::getActivityList();
		return view('admin::activity.activityList', ['list' => $activityList]);
	}
}