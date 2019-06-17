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
<<<<<<< HEAD
    Route::post('/select', 'AdminController@select');
});
=======
    Route::get('/add', 'AdminController@add');
    Route::post('/select', 'AdminController@select');

    Route::any('/brandadd', 'BrandController@brandAdd');
    Route::any('/brandshow', 'BrandController@brandShow');
    Route::any('/branddel', 'BrandController@brandDel');
    Route::any('/branddelall', 'BrandController@brandDelall');
    Route::any('/brandupdate', 'BrandController@brandUpdate');
    Route::get('/brandupdsta', 'BrandController@brandUpdsta');
    Route::any('/goodscategoryadd', 'GoodscategoryController@goodscategoryAdd');
    Route::any('/goodscategoryshow', 'GoodscategoryController@goodscategoryShow');
    Route::any('/goodscategorydel', 'GoodscategoryController@goodscategoryDel');
    Route::any('/goodscategoryupdate', 'GoodscategoryController@goodscategoryUpdate');
    Route::get('/goodscategoryupdsta', 'GoodscategoryController@goodscategoryUpdsta');

});

// Route::any('{controller}/{action}', function($controller, $action) {


//     $namespace = 'Modules\Admin\Http\Controllers\\';

//     $className = $namespace . ucfirst($controller . "Controller");

//     $tempObj = new $className();

//     return call_user_func(array($tempObj, $action));
// });

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



>>>>>>> 023315483d4c5b546572110237437fe513dc258d
>>>>>>> 7fcc343d9409b9fb8c418a816e328f65583ae7f7
