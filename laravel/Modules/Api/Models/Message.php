<?php

namespace Modules\Api\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
	protected $table = 'message';
	public $timestamps = false;
	public static function getMessage($id)
	{
		$message = Message::where('user_id', $id)->get();
		if(count($message)){
			foreach ($message as $key => $value) {
				$message[$key]['add_time'] = date('Y-m-d H:i:s', $value['add_time']);
			}
		}

		return $message;
	}
}