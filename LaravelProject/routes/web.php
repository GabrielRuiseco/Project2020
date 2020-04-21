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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adafruit', 'HomeController@adafruit')->middleware('auth');
Route::post('/set_adafruit_key', 'TokensController@updateadafruit')->middleware('auth');
Route::post('/set_api_token', 'TokensController@updateApiToken')->middleware('auth');
Route::get('/get_api_token', 'TokensController@getApiToken')->middleware('auth');
Route::get('/get_adafuit_key', 'TokensController@getadafruitKey')->middleware('auth');
Route::get('/getUsr', 'RequestController@getUsr')->middleware('auth');
