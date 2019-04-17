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
Auth::routes();

Route::get('admin/login', 'AdminController@getLogin')->name('admin.login');
Route::post('admin/login', 'AdminController@postLogin');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
	Route::resource('users', 'UserController');
	Route::resource('certificates', 'CertificateController')->only(['index', 'show']);
	Route::resource('number-requests', 'NumberRequestController')->except(['show', 'destroy']);
	Route::post('number-requests/handle/{number-request}', 'NumberRequestController@handle')->name('number-requests.handle');
});

// Logout
Route::get('logout', 'HomeController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('register-request', 'RegisterRequestController')->except(['destroy']);
    Route::get('download/{certificate}', 'HomeController@download')->name('download');
});
