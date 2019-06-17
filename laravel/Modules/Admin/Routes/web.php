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
    Route::get('/add', 'AdminController@add');
    Route::post('/select', 'AdminController@select');
    Route::get('/goods', 'GoodsController@goods');
    Route::any('/addProduct', 'GoodsController@addProduct');
    Route::any('/addProductCheck', 'GoodsController@addProductCheck');
    Route::any('/goodsDelete', 'GoodsController@goodsDelete');
    Route::any('/goodsUpdate', 'GoodsController@goodsUpdate');
    Route::any('/goodsUpdateCheck', 'GoodsController@goodsUpdateCheck');
    Route::any('/createSku', 'GoodsController@createSku');
    Route::any('/attribute', 'AttributeController@attribute');
    Route::any('/attributeCheck', 'AttributeController@attributeCheck');
    Route::any('/attributeValue', 'AttributeController@attributeValue');
    Route::any('/attributeValueCheck', 'AttributeController@attributeValueCheck');
    Route::any('/createSkuCheck', 'GoodsController@createSkuCheck');
    Route::any('/attributeList', 'AttributeController@attributeList');
    Route::any('/attributeListDelete', 'AttributeController@attributeListDelete');
    Route::any('/attributeListUpdate', 'AttributeController@attributeListUpdate');
    Route::any('/attributeUpdateCheck', 'AttributeController@attributeUpdateCheck');
    Route::any('/attributeValueList', 'AttributeController@attributeValueList');
    Route::any('/attributeValueUpdate', 'AttributeController@attributeValueUpdate');
    Route::any('/attributeValueDelete', 'AttributeController@attributeValueDelete');
    Route::any('/attributeValueUpdatec', 'AttributeController@attributeValueUpdatec');
    Route::any('/attributevalU', 'AttributeController@attributevalU');
    Route::any('/attributeListUpdatec', 'AttributeController@attributeListUpdatec');
});



