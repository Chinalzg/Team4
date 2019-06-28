<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Api\Models\Goods as Good;
use Modules\Api\Models\Cart;
use Modules\Api\Models\Collect;

class GoodsController extends Controller
{
	public function goods(Request $request)
	{
		$id = $request->input('id','');
		if(!$id){
			return response()->json(['code' => 403, 'message' => '请输入商品id']);
		}
		return response()->json(['code' => 200, 'message' => '请求成功', 'data'=> Good::getOneGoods($id)]);

	}
}