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

// Route::group(['middleware' => 'admin'], function() {
Route::get('/halaman_admin','adminController@index')
->name('admin_index');
Route::get('/admin','adminController@index')
->name('dashboard');

//pegawai
Route::get('/pegawai','adminController@pegawai_index')
->name('pegawai_index');
Route::post('/pegawai','adminController@pegawai_tambah')
->name('pegawai_tambah');
Route::get('/pegawai/edit/{id}','adminController@pegawai_edit')
->name('pegawai_edit');
Route::put('/pegawai/edit/{id}','adminController@pegawai_update')
->name('pegawai_update');
Route::get('/pegawai/hapus/{id}','adminController@pegawai_hapus')
->name('pegawai_hapus');

//Jabatan
Route::get('/jabatan','adminController@jabatan_index')
->name('jabatan_index');
Route::post('/jabatan','adminController@jabatan_tambah')
->name('jabatan_tambah');
Route::get('/jabatan/edit/{id}','adminController@jabatan_edit')
->name('jabatan_edit');
Route::put('/jabatan/edit/{id}','adminController@jabatan_update')
->name('jabatan_update');
Route::get('/jabatan/hapus/{id}','adminController@jabatan_hapus')
->name('jabatan_hapus');

//provinsi
Route::get('/provinsi','adminController@provinsi_index')->name('provinsi_index');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
