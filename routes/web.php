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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/daftar', 'Auth\RegisterController@register')->name('daftar');

Route::get('/admin/update/{biodata}', 'BiodataController@edit');
Route::patch('/update/{biodata}', 'BiodataController@update');

// ROUTES ADMIN
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    Route::get('/admin/update/{biodata}', 'BiodataController@edit');
    Route::patch('/update/{biodata}', 'BiodataController@update');
    });
});
 
 
// ROUTES PENDAFTAR
Route::group(['middleware' => 'check-permission:pendaftar'], function () {
    Route::group(['prefix' => 'pendaftar'], function () {
    Route::get('/dashboard', 'PendaftarController@index')->name('pendaftar.dashboard');
    
    Route::get('/admin/update/{biodata}', 'BiodataController@edit');
    Route::patch('/update/{biodata}', 'BiodataController@update');
 
	});
});
