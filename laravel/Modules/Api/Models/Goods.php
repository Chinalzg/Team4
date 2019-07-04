<?php

namespace Modules\Api\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Goods extends Model
{	
	protected $table = 'goods';
	
	public static function getGoods($id, $name, $stock, $price, $sortfield)
	{
		return  Db::table('goods')->where('category_id', $id)->orderBy($sortfield, $sort)->offset($off)->limit($size)->select('id','image', 'name', 'price', 'subtitle')->get();
		
	}

	public $timestamps = false;

	public static function getRecommend($size, $p)
	{	
		$offset = ($p-1)*$size;
		return Goods::where('is_new', 1)->orWhere('is_hot', 1)->offset($offset)->limit($size)->get();
	}

	public static function getOneGoods($id)
	{
		return Goods::where('id', $id)->first();
	}

	public function goodsInfo($id)
   {
       return Goods::where('id',$id)
           ->select('name','image','price')
           ->first();
           
   }


}