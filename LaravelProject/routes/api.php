<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>['auth:api']],function (){
    Route::get('/mix1', 'RequestController@selmix1');
    Route::get('/mix2', 'RequestController@selmix2');
    Route::get('/mix3', 'RequestController@selmix3');
});
