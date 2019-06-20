<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{

	public function productList()
	{
		return view('admin\productList');
	}

	public function productDetailed()
	{
		return view('admin\productDetailed');
	}
}