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

Route::get('/login','User\UserController@login');

Route::post('foo','User\UserController@foo');





Route::post('register','Login\LoginController@register');


Route::any('productlist','Admin\ProductController@productList');
Route::any('productdetailed','Admin\ProductController@productDetailed');
Route::any('getpromotion','Admin\ProductController@getPromotion');




Route::get('/brandadd','Modules\Admin\Http\Controllers\BrandController@brandAdd');

Route::group(['prefix' => 'jwt'], function () {
    Route::post('register', 'JwtController@register');
    Route::post('login', 'JwtController@login');
    Route::get('/', ['uses'=>'JwtController@index','middleware'=>'auth:apijwt']); 
    
});
