<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Api\Models\Cart as C;

class CartController extends Controller
{
	public function cart(Request $request)
	{
		if(!$request->filled('id')){
			return response()->json(['code' => 403, 'message' => '请输入用户id']);
		}

		$carts = C::getCarts($request->input('id'));
		return response()->json(['code' => 200, 'message' => '请求成功', 'data' => $carts]);		

	}
}