<?php

namespace Modules\Api\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{	
	protected $table = 'category';
	
	public static function getCategory($id, $size, $p, $sort, $sortfield)
	{
		//select * from user1 join user2 on condition where id = 
		$off = ($p-1)*$size;
		return  Db::table('goods')->where('category_id', $id)->orderBy($sortfield, $sort)->offset($off)->limit($size)->select('id','image', 'name', 'price', 'subtitle')->get();

		return  Db::table('goods')->where('category_id', $id)->orderBy($sortfield, $sort)->offset($off)->limit($size)->select('id', 'image', 'name', 'price', 'subtitle')->get();

		
	}

	public static function getCategoryRecommend()
	{
		return Category::orderBy('sort', 'asc')->limit(10)->select(['id', 'name'])->get();
	}
}