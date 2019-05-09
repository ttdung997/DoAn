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

Route::group(['namespace' => 'API'], function() {
    Route::get('/{user}', 'HomeController@index');
    Route::apiResource('register-request', 'RegisterRequestController')->except(['update, destroy']);
    Route::get('download-cert/{id}', 'HomeController@download')->name('download-cert');
    Route::get('download-pkcs12/{id}', 'HomeController@download')->name('download-pkcs12');
    Route::get('check-cert/{user}/{serialNumber}', 'HomeController@checkCert')->name('check-cert');
    Route::post('revoke/{user}', 'RevokeController@revoke')->name('revoke');
});
