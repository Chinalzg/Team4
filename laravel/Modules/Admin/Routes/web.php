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

Route::prefix('admin')->group(function() {
    Route::get('/index', 'AdminController@index');
    Route::post('/select', 'AdminController@select');
    Route::get('order/list', 'OrderController@list');
    Route::get('order/orderList', 'OrderController@OrderDetail');
    Route::post('order/updateUserInfo', 'OrderController@updateUserInfo');
    Route::post('order/orderChange', 'OrderController@OrderChange');
    Route::any('order/orderStatusInsert', 'OrderController@OrderStatusInsert');
    Route::get('order/orderStatusList', 'OrderController@OrderStatusList');
    Route::get('order/orderStatusDelete', 'OrderController@OrderStatusDelete');
    Route::any('order/orderStatusUpdate', 'OrderController@OrderStatusUpdate');
    Route::any('activityInsert', 'ActivityController@activityInsert');
    Route::get('activityList', 'ActivityController@activityList');
    // Route::get('order/orderStatus', 'OrderController@OrderStatusList');

});
