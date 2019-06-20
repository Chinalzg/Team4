<?php

namespace Modules\Api\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
	protected $table = 'user';
	public $timestamps = false;
	protected $fillable = ['name', 'password', 'email', 'add_time', 'tel', 'nickName', 'bir' ,'image', 'sex'];

	public static function insertUser($data)
	{	
		$data['password'] = md5($data['password']);
		$data['add_time'] = time();
		return User::insertGetId($data);
	}
}