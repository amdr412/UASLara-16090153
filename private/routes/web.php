<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/laporan_masyarakat', function () {
    return view('laporan_masyarakat');
});
Route::post('/laporan_masyarakat_tambah','userController@kirim_laporan');
Auth::routes();

Route::group(['middleware'=> 'auth'],function(){

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/map_kebutuhan','mapController@kebutuhan_index')->name('map_kebutuhan');
Route::get('/map_ketersediaan','mapController@ketersediaan_index')->name('map_ketersediaan');
Route::get('/map_detail/{id}','mapController@detail')->name('map_detail');


//route  jenis rambu
Route::get('/jenis_rambu','rambuController@jenis_rambu_index')->name('jenis_rambu_index');
Route::post('/jenis_rambu','rambuController@jenis_rambu_add')->name('jenis_rambu_add');
Route::get('/jenis_rambu_edit/{id}','rambuController@jenis_rambu_edit')->name('jenis_rambu_edit');
Route::get('/jenis_rambu_detail/{id}','rambuController@jenis_rambu_detail')->name('jenis_rambu_detail');
Route::get('/jenis_rambu_detail_cetak/{id}','rambuController@jenis_rambu_detail_cetak')->name('jenis_rambu_detail_cetak');
Route::put('/jenis_rambu_edit/{id}','rambuController@jenis_rambu_update')->name('jenis_rambu_update');
Route::get('/jenis_rambu_hapus/{id}','rambuController@jenis_rambu_hapus')->name('jenis_rambu_hapus');

//Route Rambu
Route::get('/rambu','rambuController@rambu_index')->name('rambu_index');
Route::post('/rambu','rambuController@rambu_add')->name('rambu_add');
Route::get('/rambu_detail/{id}','rambuController@rambu_detail')->name('rambu_detail');
Route::get('/rambu_edit/{id}','rambuController@rambu_edit')->name('rambu_edit');
Route::put('/rambu_edit/{id}','rambuController@rambu_update')->name('rambu_update');
Route::get('/rambu_hapus/{id}','rambuController@rambu_hapus')->name('rambu_hapus');
Route::get('/rambu_keseluruhan_cetak','rambuController@rambu_keseluruhan_cetak')->name('rambu_keseluruhan_cetak');
Route::get('/rambu_detail_cetak/{id}','rambuController@rambu_detail_cetak')->name('rambu_detail_cetak');

//kecamatan
Route::get('/kecamatan','lokasiController@kecamatan_index')->name('kecamatan_index');
Route::post('/kecamatan','lokasiController@kecamatan_add')->name('kecamatan_add');
Route::get('/kecamatan_hapus/{id}','lokasiController@kecamatan_delete')->name('kecamatan_delete');
Route::get('/kecamatan_detail/{id}','lokasiController@kecamatan_detail')->name('kecamatan_detail');
Route::get('kecamatan_kebutuhan_cetak/{id}','lokasiController@kecamatan_detail_cetak')->name('kecamatan_kebutuhan_cetak');


//kelurahan
Route::get('/kelurahan','lokasiController@kelurahan_index')->name('kelurahan_index');
Route::post('/kelurahan','lokasiController@kelurahan_add')->name('kelurahan_add');
Route::get('/kelurahan_edit/{id}','lokasiController@kelurahan_edit')->name('kelurahan_edit');
Route::put('/kelurahan_edit/{id}','lokasiController@kelurahan_update')->name('kelurahan_update');
Route::get('/kelurahan_hapus/{id}','lokasiController@kelurahan_delete')->name('kelurahan_delete');
Route::get('kelurahan_detail/{id}','lokasiController@kelurahan_detail')->name('kelurahan_detail');
Route::get('kelurahan_ketersediaan_cetak/{id}','lokasiController@kelurahan_ketersediaan_cetak')->name('kelurahan_ketersediaan_cetak');
Route::get('kelurahan_kebutuhan_cetak/{id}','lokasiController@kelurahan_kebutuhan_cetak')->name('kelurahan_kebutuhan_cetak');

//lokasi kebutuhan rambu
Route::get('/lokasi_kebutuhan','lokasiController@lokasi_kebutuhan_index')->name('lokasi_kebutuhan_index');
Route::get('/lokasi_kebutuhan_tambah','lokasiController@lokasi_kebutuhan_tambah')->name('lokasi_kebutuhan_tambah');
Route::post('/lokasi_kebutuhan_tambah','lokasiController@lokasi_kebutuhan_store')->name('lokasi_kebutuhan_store');
Route::get('/lokasi_kebutuhan_detail/{id}','lokasiController@lokasi_kebutuhan_detail')->name('lokasi_kebutuhan_detail');
Route::get('/lokasi_kebutuhan_edit/{id}','lokasiController@lokasi_kebutuhan_edit')->name('lokasi_kebutuhan_edit');
Route::put('/lokasi_kebutuhan_edit/{id}','lokasiController@lokasi_kebutuhan_update')->name('lokasi_kebutuhan_update');
Route::get('/lokasi_kebutuhan_hapus/{id}','lokasiController@lokasi_kebutuhan_hapus')->name('lokasi_kebutuhan_hapus');
Route::get('/lokasi_kebutuhan_keseluruhan_cetak','lokasiController@lokasi_kebutuhan_keseluruhan_cetak')->name('lokasi_kebutuhan_keseluruhan_cetak');
Route::get('/lokasi_kebutuhan_detail_cetak/{id}','lokasiController@lokasi_kebutuhan_detail_cetak')->name('lokasi_kebutuhan_detail_cetak');
Route::post('/lokasi_kebutuhan','lokasiController@lokasi_kebutuhan_filter_cetak')->name('lokasi_kebutuhan_filter_cetak');


// lokasi ketersediaan rambu
Route::get('/lokasi_ketersediaan','lokasiController@lokasi_ketersediaan_index')->name('lokasi_ketersediaan_index');
Route::get('/lokasi_ketersediaan_tambah','lokasiController@lokasi_ketersediaan_tambah')->name('lokasi_ketersediaan_tambah');
Route::post('/lokasi_ketersediaan_tambah','lokasiController@lokasi_ketersediaan_store')->name('lokasi_ketersediaan_store');
Route::get('/lokasi_ketersediaan_detail/{id}','lokasiController@lokasi_ketersediaan_detail')->name('lokasi_ketersediaan_detail');
Route::get('/lokasi_ketersediaan_edit/{id}','lokasiController@lokasi_ketersediaan_edit')->name('lokasi_ketersediaan_edit');
Route::put('/lokasi_ketersediaan_edit/{id}','lokasiController@lokasi_ketersediaan_update')->name('lokasi_ketersediaan_update');
Route::get('/lokasi_ketersediaan_hapus/{id}','lokasiController@lokasi_ketersediaan_hapus')->name('lokasi_ketersediaan_hapus');
Route::get('/lokasi_ketersediaan_keseluruhan_cetak','lokasiController@lokasi_ketersediaan_keseluruhan_cetak')->name('lokasi_ketersediaan_keseluruhan_cetak');
Route::get('/lokasi_rehab_cetak/{id}','lokasiController@lokasi_rehab_cetak')->name('lokasi_rehab_cetak');
Route::post('/lokasi_ketersediaan','lokasiController@lokasi_ketersediaan_filter_cetak')->name('lokasi_ketersediaan_filter_cetak');



// data laporan Masyarakat
Route::get('/laporan_masyarakat_data','userController@laporan_masyarakat_data')->name('laporan_masyarakat_data');
Route::get('/laporan_masyarakat_show/{id}','userController@laporan_masyarakat_show')->name('laporan_masyarakat_show');
Route::get('/laporan_masyarakat_hapus/{id}','userController@laporan_masyarakat_hapus')->name('laporan_masyarakat_hapus');
Route::get('/laporan_masyarakat_keseluruhan_cetak','userController@laporan_masyarakat_keseluruhan_cetak')->name('laporan_masyarakat_keseluruhan_cetak');


//pejabat Struktural
Route::get('/pejabat_struktural','pejabatController@pejabat_struktural_index')->name('pejabat_struktural_index');
Route::post('/pejabat_struktural','pejabatController@pejabat_struktural_tambah')->name('pejabat_struktural_tambah');
Route::get('/pejabat_struktural_hapus/{id}','pejabatController@pejabat_struktural_hapus')->name('pejabat_struktural_hapus');

//user
Route::get('/user','userController@user_index')->name('user_index');


});
