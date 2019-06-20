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
    Route::get('/getCategory', 'CategoryController@categoryList');//获取某个分类的
    Route::post('/insertCart', 'CategoryController@insertCart');//添加购物车
    Route::post('/insertCollect', 'CategoryController@insertCollect');
    Route::post('/register', 'UserController@register');
    Route::get('/invite', 'UserController@invite');
});
