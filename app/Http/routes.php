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
Route::get('suggestion',function(){
	return view("suggestions.suggestions");
});
Route::get('tag',function(){
	return view("tags.tags");
});
Route::get('user',function(){
	return view("users.users");
});
//Route::get('');
//Route::get('');