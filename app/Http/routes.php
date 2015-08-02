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

Route::get('/','Insugg@index');
Route::get('insugg','Insugg@index');
Route::get('suggestion','Suggestion@index');
Route::get('tag','Tag@index');
Route::get('user',function(){
	return view("users.users");
});

// route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('x', ['middleware' => 'auth', function()
{
	// if user is not logged in
	// he/she will be redirected to the login page
	// and this code will not be executed
}]);