<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'IndexController@index');

Route::get('dang-nhap', 'LoginController@index');
Route::get('dang-xuat', 'LoginController@logout');

Route::get('dang-ky', 'RegisterController@index');
Route::get('danh-muc', 'CategoryController@index');
Route::get('dang-tin', 'PostController@index');
Route::get('kich-hoat/{token}', 'ActiveController@index');

Route::get('thanh-cong', 'SuccessController@index');
//dang-ky/register
Route::post('dang-ky/register', 'RegisterController@register');
/* Route::get('/login', function () {
	return view('login');
}); */
Route::post('login/logon', 'LoginController@logon');
Route::get('post/upload', 'PostController@upload');
Route::post('post/upload', 'PostController@upload');

Route::post('post/create', 'PostController@create');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});