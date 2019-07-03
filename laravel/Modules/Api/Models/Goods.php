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
}