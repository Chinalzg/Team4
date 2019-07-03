<?php

namespace Modules\Api\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{	
	protected $table = 'cart';
	public $timestamps = false;
	protected $fillable = ['user_id', 'goods_id', 'goods_num', 'price' , 'add_time'];
	public static function insertCart($input)
	{	

		$input['add_time'] = time();
		return Cart::create($input);
	}

	public static function getCarts($id)
	{
		$carts = Cart::where('user_id', $id)->get();
		if(count($carts)>0){
			foreach ($carts as $key => $value) {
				$carts[$key]['add_time'] = date('Y-m-d H:i:s', $value['add_time']);
			}
		}
		
		return $carts;
	}
	 //具体个人的购物车信息
    public function cartSelect($id,$limit,$size)
    {
        return Cart::where('user_id',$id)
            ->offset($limit)
            ->limit($size)
            ->get()
            ->toArray();
    }

    public function cartDelete($id)
    {
        return Cart::where('id',$id)
            ->delete();
    }

    //某一个订单的信息
    public function cartInfo($id,$userid)
    {
        return Cart::where('goods_id',$id)
            ->where('user_id',$userid)
            ->first()->toArray();
    }

}