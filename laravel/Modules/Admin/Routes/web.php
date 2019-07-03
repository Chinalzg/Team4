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

    Route::any('/select', 'AdminController@select');
    Route::post('/login', 'AdminController@login');

    Route::get('/add', 'AdminController@add');
    Route::post('/select', 'AdminController@select');

    Route::get('/logout', 'AdminController@logout');
    Route::get('/welcome','AdminController@welcome');
    //菜单
    Route::get('/menu/menuAdd','MenuController@menuAdd');

    Route::post('/menu/menuAdds','MenuController@menuAdds');

    Route::get('/serviceshow', 'CommentController@serviceShow');
    Route::get('/menu/menuShow','MenuController@menuShow');

    Route::get('/menu/childPower','MenuController@childPower');

    Route::get('/menu/menuDel', 'MenuController@menuDel');

    Route::get('/menu/menuUpd', 'MenuController@menuUpd');

    Route::post('/menu/menuUpdate','MenuController@menuUpdate');



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

  //角色
    Route::get('/role/roleAdd','RoleController@roleAdd');

    Route::post('/role/roleAdds','RoleController@roleAdds');

    Route::get('/role/roleShow','RoleController@roleShow');
    Route::get('/role/roleSon','RoleController@roleSon');

    Route::get('/role/sonDel','RoleController@sonDel');

    Route::get('/role/roleDel','RoleController@roleDel')->middleware('mustPower');
    Route::get('/role/roleUpd','RoleController@roleUpd')->middleware('mustPower');

    Route::post('/role/roleUpdate','RoleController@roleUpdate');
     //用户
    Route::get('/user/userAdd','UserController@userAdd');

    Route::post('/user/userAdds','userController@userAdds');

    Route::get('/user/userShow','UserController@userShow');

    Route::get('/user/userDel','UserController@userDel')->middleware('mustPower');
    Route::get('/user/userUpd','UserController@userUpd')->middleware('mustPower');

    Route::post('/user/userUpdate','UserController@userUpdate');

// Route::any('{controller}/{action}', function($controller, $action) {


//     $namespace = 'Modules\Admin\Http\Controllers\\';

//     $className = $namespace . ucfirst($controller . "Controller");

//     $tempObj = new $className();

//     return call_user_func(array($tempObj, $action));
// });

    Route::get('/goods', 'GoodsController@goods');
    Route::get('/addProduct', 'GoodsController@addProduct');
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
       Route::get('/review', 'CommentController@review');
    Route::get('/reviewshow', 'CommentController@reviewShow');
    Route::get('/reviewupdate', 'CommentController@reviewUpdate');
    Route::get('/commentReply', 'CommentController@commentReply');

    Route::get('/commentDel', 'CommentController@commentDel');
    Route::get('/srvice', 'CommentController@service');
    Route::get('/srviceshow', 'CommentController@serviceShow');
    Route::get('/srviceinsert', 'CommentController@serviceInsert');

    Route::get('/house', 'WareHouseController@house');
    Route::get('/housecreate', 'WareHouseController@houseCreate');
    Route::post('/housesave', 'WareHouseController@houseSave');
    Route::get('/houseshow', 'WareHouseController@houseShow');
    Route::post('/house', 'WareHouseController@house');
    Route::get('/houseupdate', 'WareHouseController@houseUpdate');
    Route::post('/houseupdate', 'WareHouseController@houseUpdate');
    Route::get('/housenumber', 'WareHouseController@houseNumber');
    Route::get('/housestop', 'WareHouseController@houseStop');
    Route::get('/statusupdate', 'WareHouseController@houseStatusUpdate');
    Route::get('/statusupdates', 'WareHouseController@houseStatusUpdates');
    Route::get('/housedelete', 'WareHouseController@houseDelete');

});
Route::get('/changeLocale/{locale}', 'AdminController@changeLocale')->middleware('setLocale');

