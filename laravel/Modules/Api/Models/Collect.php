<?php

namespace Modules\Api\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Collect extends Model
{	
	protected $table = 'collect';
	public $timestamps = false;
	protected $fillable = ['user_id', 'goods_id', 'add_time'];
	public static function insertCollect($data)
	{	

		$data['add_time'] = time();

		DB::beginTransaction();

		$userResult = DB::table('user')->increment('collects');
		$collectResult = DB::table('collect')->insert($data);

		if($userResult && $collectResult){
			DB::commit();
			return true;
		}else{
			DB::rollBack();
			return false;
		}
	}

	public static function isCollect($data)
	{
		return Collect::where('user_id', $data['user_id'])->where('goods_id', $data['goods_id'])->get();
	}
	public function colSlect($id)
    {
         return Collect::where('user_id',$id)
             ->get()
             ->toArray();
    }

    public function colDel($id,$goods_id){
        return Collect::where('user_id',$id)
            ->where('goods_id',$goods_id)
            ->delete();
    }
}