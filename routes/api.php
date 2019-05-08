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

Route::namespace('API')->group(function () {
    Route::get('/{id}', 'HomeController@index');
    Route::apiResource('register-request', 'RegisterRequestController')->except(['edit, update, destroy']);
    Route::get('download-cert/{certificate}', 'HomeController@download')->name('download-cert');
    Route::get('download-pkcs12/{certificate}', 'HomeController@download')->name('download-pkcs12');
});
