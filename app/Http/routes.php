<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/


Route::get('/', function () {    
	return view('welcome');
});

Route::get('/home', 'DashboardController@index');


