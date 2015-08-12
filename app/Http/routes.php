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

Route::get('user','User@Index');
Route::get('user/{id}','User@show');

Route::get('/','Insugg@index');
Route::get('insugg','Insugg@index');
Route::get('insugg/{id}','Insugg@show');

Route::get('createInsugg',function(){
	return view('insugg.createInsugg');
});

Route::get('tag','Tag@index');
Route::get('tag/{id}','Tag@show');

Route::get('suggestion','Suggestion@index');
Route::get('suggestion/{id}','Suggestion@show');


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

Route::get('profile','User@profile');

//Aliases config/app.php de
