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

	Route::get('/','HomeController@index');

	Route::post('/auth','AuthController@index');

	Route::get('/print','HomeController@printpage');

	Route::get('/expiry','AuthController@expiry');

	Route::post('/file-print','PrintController@index');


