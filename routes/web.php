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

Route::get('/admin','adminController@index')->name('dashboard');

//pegawai
Route::get('/pegawai','adminController@pegawai_index')->name('pegawai_index');
Route::get('/pegawai_edit','adminController@pegawai_edit')->name('pegawai_edit');
