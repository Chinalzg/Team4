<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

	public function productList(Request $request)
	{	
		$request->session()->put('user_id', '5');
		$value = $request->session()->get('user_id');
		$sum = Db::table('cart')->where('user_id', $value)->count();
		return view('admin\productList',['user_id'=>$value, 'sum'=>$sum]);
	}

	public function getpromotion(){
		return view('admin\productPromotion');
	}

	public function productDetailed()
	{
		return view('admin\productDetailed');
	}
}