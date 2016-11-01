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

Route::get('/fetch', 'ExtractionController@index');
Route::post('/fetchdata', 'ExtractionController@fetcher');


