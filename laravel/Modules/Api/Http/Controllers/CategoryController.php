<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Api\Models\Category as Cat;
use Modules\Api\Models\Cart;
use Modules\Api\Models\Collect;

class CategoryController extends Controller
{
	 public function categoryList(Request $request)
	 {	
	 	$catId = $request->input('id');
	 	if(!$catId){
	 		
			return response()->json(['code' => 406 ,'message'=>'无效访问', 'data'=>[]]);
	 	}
	 		$size = $request->input('size', 20);
		 	$p = $request->input('p', 1);
		 	$sort = $request->input('sort', 'asc');
		 	$sortfield = $request->input('s_field', 'price');
		 	$data = Cat::getCategory($catId, $size, $p, $sort, $sortfield);
		 	
		 	return response()->json([
		        'code' => '200', 
		        'message' => '分类商品获取成功',
		        'data' => $data
			]);
	 
	 }

	 public function insertCart(Request $request)
	 {
	 	if(!$request->filled(['user_id', 'goods_id', 'goods_num', 'price'])){
    		return response()->json(['code' => 403, 'message' => '用户id,商品id,数量,价格不能为空']);
		}
	 	
	 	$input = $request->only(['user_id', 'goods_id', 'goods_num', 'price']);

	 	$data = Cart::insertCart($input);

	 	if(!$data){
	 		return response()->json(['code' => '407', 'message' => '添加失败']);
	 	}

	 	return response()->json(['code' => '200', 'message' => '添加成功']);
	 	
	 }

	 public function insertCollect(Request $request)
	 {
	 	if(!$request->filled(['user_id', 'goods_id'])){
	 		return response()->json(['code' => 403, 'message' => '用户id，商品id不能为空']);
	 	}

		$userResult = Collect::isCollect($request->only(['user_id', 'goods_id']));

		if(!empty($userResult[0])){
			return response()->json(['code' => 407, 'message' => '已收藏']);
		}

	 	$result = Collect::insertCollect($request->only(['user_id', 'goods_id']));

	 	if(!$result){
	 		return response()->json(['code' => 406, 'message' => '请求超时，请重试']);
	 	}

	 	return response()->json(['code' => 200, 'message' => '添加成功']);
	 }


	 public function getPromotion(Request $request)
	 {	
	 	$catId = $request->input('id');
	 	if(!$catId){
	 		
			return response()->json(['code' => 406 ,'message'=>'无效访问', 'data'=>[]]);
	 	}
	 		$size = $request->input('size', 20);
		 	$p = $request->input('p', 1);
		 	$sort = $request->input('sort', 'asc');
		 	$sortfield = $request->input('s_field', 'price');
		 	$data = Cat::getCategory($catId, $size, $p, $sort, $sortfield);
		 	
		 	return response()->json([
		        'code' => '200', 
		        'message' => '分类商品获取成功',
		        'data' => $data
			]);
	 
	 }

	
}