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

//Pangkat
Route::get('/pangkat','adminController@pangkat_index')
->name('pangkat_index');
Route::post('/pangkat','adminController@pangkat_tambah')
->name('pangkat_tambah');
Route::get('/pangkat/edit/{id}','adminController@pangkat_edit')
->name('pangkat_edit');
Route::put('/pangkat/edit/{id}','adminController@pangkat_update')
->name('pangkat_update');
Route::get('/pangkat/hapus/{id}','adminController@pangkat_hapus')
->name('pangkat_hapus');

//Anggaran
Route::get('/anggaran','adminController@anggaran_index')
->name('anggaran_index');
Route::post('/anggaran','adminController@anggaran_tambah')
->name('anggaran_tambah');
Route::get('/anggaran/edit/{id}','adminController@anggaran_edit')
->name('anggaran_edit');
Route::put('/anggaran/edit/{id}','adminController@anggaran_update')
->name('anggaran_update');
Route::get('/anggaran/hapus/{id}','adminController@anggaran_hapus')
->name('anggaran_hapus');

//Kegiatan
Route::get('/kegiatan','adminController@kegiatan_index')
->name('kegiatan_index');
Route::post('/kegiatan','adminController@kegiatan_tambah')
->name('kegiatan_tambah');
Route::get('/kegiatan/edit/{id}','adminController@kegiatan_edit')
->name('kegiatan_edit');
Route::put('/kegiatan/edit/{id}','adminController@kegiatan_update')
->name('kegiatan_update');
Route::get('/kegiatan/hapus/{id}','adminController@kegiatan_hapus')
->name('kegiatan_hapus');

//Transportasi
Route::get('/transportasi','adminController@transportasi_index')
->name('transportasi_index');
Route::post('/transportasi','adminController@transportasi_tambah')
->name('transportasi_tambah');
Route::get('/transportasi/edit/{id}','adminController@transportasi_edit')
->name('transportasi_edit');
Route::put('/transportasi/edit/{id}','adminController@transportasi_update')
->name('transportasi_update');
Route::get('/transportasi/hapus/{id}','adminController@transportasi_hapus')
->name('transportasi_hapus');

//provinsi
Route::get('/provinsi','adminController@provinsi_index')
->name('provinsi_index');
Route::post('/provinsi','adminController@provinsi_tambah')
->name('provinsi_tambah');
Route::get('/provinsi/edit/{id}','adminController@provinsi_edit')
->name('provinsi_edit');
Route::put('/provinsi/edit/{id}','adminController@provinsi_update')
->name('provinsi_update');
Route::get('/provinsi/hapus/{id}','adminController@provinsi_hapus')
->name('provinsi_hapus');
// });

//kabupaten
Route::get('/kabupaten','adminController@kabupaten_index')
->name('kabupaten_index');
Route::post('/kabupaten','adminController@kabupaten_tambah')
->name('kabupaten_tambah');
Route::get('/kabupaten/edit/{id}','adminController@kabupaten_edit')
->name('kabupaten_edit');
Route::put('/kabupaten/edit/{id}','adminController@kabupaten_update')
->name('kabupaten_update');
Route::get('/kabupaten/hapus/{id}','adminController@kabupaten_hapus')
->name('kabupaten_hapus');
// });

//kecamatan
Route::get('/kecamatan','adminController@kecamatan_index')
->name('kecamatan_index');
Route::post('/kecamatan','adminController@kecamatan_tambah')
->name('kecamatan_tambah');
Route::get('/kecamatan/edit/{id}','adminController@kecamatan_edit')
->name('kecamatan_edit');
Route::put('/kecamatan/edit/{id}','adminController@kecamatan_update')
->name('kecamatan_update');
Route::get('/kecamatan/hapus/{id}','adminController@kecamatan_hapus')
->name('kecamatan_hapus');
// });

//kelurahan
Route::get('/kelurahan','adminController@kelurahan_index')
->name('kelurahan_index');
Route::post('/kelurahan','adminController@kelurahan_tambah')
->name('kelurahan_tambah');
Route::get('/kelurahan/edit/{id}','adminController@kelurahan_edit')
->name('kelurahan_edit');
Route::put('/kelurahan/edit/{id}','adminController@kelurahan_update')
->name('kelurahan_update');
Route::get('/kelurahan/hapus/{id}','adminController@kelurahan_hapus')
->name('kelurahan_hapus');
// });

//tujuan
Route::get('/tujuan','adminController@tujuan_index')
->name('tujuan_index');
Route::get('get-kabupaten-list','adminController@getKabupatenList');
Route::get('get-kecamatan-list','adminController@getKecamatanList');
Route::get('get-kelurahan-list','adminController@getKelurahanList');
Route::post('/tujuan','adminController@tujuan_tambah')
->name('tujuan_tambah');
Route::get('/tujuan/edit/{id}','adminController@tujuan_edit')
->name('tujuan_edit');
Route::put('/tujuan/edit/{id}','adminController@tujuan_update')
->name('tujuan_update');
Route::get('/tujuan/hapus/{id}','adminController@tujuan_hapus')
->name('tujuan_hapus');
// });

//sppd
Route::get('/sppd','adminController@sppd_index')
->name('sppd_index');
Route::post('/sppd','adminController@sppd_tambah')
->name('sppd_tambah');
Route::get('/sppd/edit/{id}','adminController@sppd_edit')
->name('sppd_edit');
Route::put('/sppd/edit/{id}','adminController@sppd_update')
->name('sppd_update');
Route::get('/sppd/hapus/{id}','adminController@sppd_hapus')
->name('sppd_hapus');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
