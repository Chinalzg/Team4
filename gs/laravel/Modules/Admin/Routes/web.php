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
    Route::post('/login', 'AdminController@login');
    Route::get('/select', 'AdminController@select');
    Route::get('/logout', 'AdminController@logout');
    Route::get('/welcome','AdminController@welcome');

    //菜单
    Route::get('/menu/menuAdd','MenuController@menuAdd');

    Route::post('/menu/menuAdds','MenuController@menuAdds');


    Route::get('/menu/menuShow','MenuController@menuShow');

    Route::get('/menu/childPower','MenuController@childPower');

    Route::get('/menu/menuDel', 'MenuController@menuDel')->middleware('mustPower');

    Route::get('/menu/menuUpd', 'MenuController@menuUpd')->middleware('mustPower');

    Route::post('/menu/menuUpdate','MenuController@menuUpdate');


    //用户
    Route::get('/user/userAdd','UserController@userAdd');

    Route::post('/user/userAdds','userController@userAdds');

    Route::get('/user/userShow','UserController@userShow');

    Route::get('/user/userDel','UserController@userDel')->middleware('mustPower');
    Route::get('/user/userUpd','UserController@userUpd')->middleware('mustPower');

    Route::post('/user/userUpdate','UserController@userUpdate');

    //角色
    Route::get('/role/roleAdd','RoleController@roleAdd');

    Route::post('/role/roleAdds','RoleController@roleAdds');

    Route::get('/role/roleShow','RoleController@roleShow');
    Route::get('/role/roleSon','RoleController@roleSon');

    Route::get('/role/sonDel','RoleController@sonDel');

    Route::get('/role/roleDel','RoleController@roleDel')->middleware('mustPower');
    Route::get('/role/roleUpd','RoleController@roleUpd')->middleware('mustPower');

    Route::post('/role/roleUpdate','RoleController@roleUpdate');
});
