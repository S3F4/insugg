<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('mobile',function(){
	return view('mobile');
});

Route::get('user','User@index');
Route::get('user/{id}/{get?}','User@show');
Route::get('profile/{get?}', 'User@profile');

Route::get('/','Insugg@index');
Route::get('insugg','Insugg@index');
Route::get('insugg/{id}','Insugg@show');
Route::post('createInsugg','Insugg@store');
Route::get('insugg/{id}/edit','Insugg@edit');
Route::post('insugg/{id}/edit','Insugg@update');
Route::get('insugg/{id}/delete','Insugg@destroy');


Route::get('createInsugg','Insugg@create');

Route::get('tag','Tag@index');
Route::get('tag/{id}','Tag@show');

Route::get('suggestion','Suggestion@index');
Route::get('suggestion/{id}','Suggestion@show');
Route::get('suggestion/{id}/delete','Suggestion@destroy');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


/**
 * Admin
 */
Route::get('admin/','AdminController@Index');

Route::get('admin/user','AdminController@Users');

Route::get('admin/insugg','AdminController@Index');

Route::get('admin/suggestion','AdminController@Index');

Route::get('admin/tag','AdminController@Index');

Route::get('admin/statistics','AdminController@Index');

Route::get('admin/monitor','AdminController@Index');

/**
 * /Admin
 */



//Aliases config/app.php de
