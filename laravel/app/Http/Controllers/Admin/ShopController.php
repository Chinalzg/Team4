<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ShopController extends Controller
{
	public function shopCart()
	{
		return view('admin\shopCart');
	}
}