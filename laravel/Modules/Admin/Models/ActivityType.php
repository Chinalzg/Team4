<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
	  protected $table = 'activity_type';
      public $timestamps = false;

      public function Activity()
      {
      		return $this->belongsTo('Modules\Admin\Models\Activity', 'id', 'activity_id');
      }

      public static function getActiveType()
      {
      		return ActivityType::get()->toArray();
      }

      public static function getActivityList()
      {		
      	return ActivityType::find(2)->Activity->toArray();
      		// return Activity::get()->toArray();
      }
}