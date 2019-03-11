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
Route::get('admin/login', 'AdminController@getLogin')->name('admin.login');
Route::post('admin/login', 'AdminController@postLogin');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
	Route::resource('users', 'UserController')->only(['index', 'show']);
	Route::resource('certificates', 'CertificateController')->only(['index', 'show']);
	Route::resource('number-requests', 'NumberRequestController')->only(['index', 'show']);
});
