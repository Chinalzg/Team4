<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Activity extends Model
{
	protected $table = 'activity';
      public $timestamps = false;
      public $guarded = ['_token'];


      public static function getActiveType()
      {
      		return ActivityType::get()->toArray();
      }

      public static function activityInsert($data)
      {		
      		unset($data['_token']);
      		return Activity::create($data);
      }

      public static function getActivityList()
      {		
      	return Db::table('activity as a')->join('activity_type as t', 'a.activity_id', '=', 't.id')->join('goods as g', 'a.goods_id', '=', 'g.id')->select('a.id', 'a.title', 'a.content', 'a.start_time', 'a.end_time', 't.activity_name', 'g.name')->paginate(5);
      						         
      }
}