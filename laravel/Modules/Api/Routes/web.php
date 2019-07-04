<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('api')->group(function() {
    //分类商品
    Route::get('/getCategory', 'CategoryController@categoryList')->middleware('token');//获取某个分类的
    Route::post('/insertCart', 'CategoryController@insertCart')->middleware('token');//添加购物车
    Route::post('/insertCollect', 'CategoryController@insertCollect')->middleware('token');//添加收藏
    Route::post('/register', 'UserController@register');//注册
    Route::get('/invite', 'UserController@invite');//注册激活
    Route::post('/login', 'UserController@login');//登陆
    Route::get('/myCart', 'CartController@cart')->middleware('token');//我的购物车
    Route::get('/message', 'UserController@message')->middleware('token');//我的消息
    Route::get('/recommend', 'UserController@recommend')->middleware('token');//为您推荐
    Route::get('/categoryRecommend', 'CategoryController@categoryRecommend')->middleware('token');//分类推荐
    Route::get('/getOneGoods', 'GoodsController@goods')->middleware('token');
    Route::get('/getCoupon', 'UserController@coupon')->middleware('token');
    Route::get('/getInteg', 'UserController@integ')->middleware('token');
});
