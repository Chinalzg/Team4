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

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> 023315483d4c5b546572110237437fe513dc258d
Route::post('foo','User\UserController@foo');

Route::post('register','Login\LoginController@register');
<<<<<<< HEAD

Route::get('/brandadd','Modules\Admin\Http\Controllers\BrandController@brandAdd');
=======
>>>>>>> 321b3bc3c2bdb352583554e7a0342dafc4971d04
>>>>>>> 023315483d4c5b546572110237437fe513dc258d
