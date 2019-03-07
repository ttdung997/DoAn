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

Route::group(['prefix' => 'admin'], function() {
    Route::view('/', 'admin/users/index');
    Route::view('/certificates', 'admin/certificates/index')->name('certificates');
    Route::view('/requests', 'admin/requests/index')->name('requests');
});