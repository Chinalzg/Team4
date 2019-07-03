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

Route::get('/', function () {
    return view('welcome');
});


Route::post('foo','User\UserController@foo');

Route::post('register','Login\LoginController@register');
<<<<<<< HEAD
=======


Route::get('/brandadd','Modules\Admin\Http\Controllers\BrandController@brandAdd');

Route::group(['prefix' => 'jwt'], function () {
    Route::post('register', 'JwtController@register');
    Route::post('login', 'JwtController@login');
    Route::get('/', ['uses'=>'JwtController@index','middleware'=>'auth:apijwt']); 
    
});

<<<<<<< HEAD
Route::view('/shopCart', 'shopCart');
=======
Route::view('/shopCart', 'shopCart');
>>>>>>> a
>>>>>>> 3ce4f1bb282214f046971d70a428723b86d5d83a
