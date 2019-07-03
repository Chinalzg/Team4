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

	public static function getUser($data)
	{
		return User::where('name', $data['name'])->where('password', md5($data['password']))->first();
	}

	public static function getCoupon($id)
	{
		return Db::table('purse')->where('user_id', $id)->where('type', 0)->select(['id', 'value', 'number'])->get();
	}

	public static function getInteg($id)
	{
		return Db::table('purse')->where('user_id', $id)->where('type', 1)->select(['id', 'value'])->get();
	}

	
}