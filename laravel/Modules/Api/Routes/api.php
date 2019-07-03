<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/api', function (Request $request) {
    return $request->user();
});
Route::get('/userShow','UserController@userShow');
Route::post('/userUpd','UserController@userUpd');

Route::get('/userCollect','UserController@userCollect');

Route::get('/userColdel','UserController@userColdel');


//订单
Route::get('/orderShowall','UserController@orderShowall');
Route::get('/orderUnpaid','UserController@orderUnpaid');
Route::get('/orderUndone','UserController@orderUndone');
Route::get('/orderComment','UserController@orderComment');

//购物车
Route::get('/cartShow','GoodsController@cartShow');

Route::get('/cartDel','GoodsController@cartDel');

Route::post('/cartUpd','GoodsController@cartUpd');

Route::get('/limitTime','GoodsController@limitTime');
