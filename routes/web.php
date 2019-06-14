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
    // return view('welcome');
    return redirect('home');
});

Auth::routes();

// route dashboard
Route::get('/home', 'HomeController@index')->name('home');

// route resepsionis
Route::resource('reservasi', 'ReservasiController');
Route::get('updateStatus/{id}/{newstatus}', [
    'as' => 'updateStatus', 'uses' => 'ReservasiController@updateStatus']);
Route::get('createCheckIn/{id}', 
    ['as' => 'createCheckInWithID', 'uses' => 'ReservasiController@createCheckIn']);
Route::get('createCheckIn', 
    ['as' => 'createCheckIn', 'uses' => 'ReservasiController@createCheckIn']);
Route::post('storeCheckIn', 
    ['as' => 'storeCheckIn', 'uses' => 'ReservasiController@storeCheckIn']);

Route::resource('guestin', 'GuestInController');
Route::post('storetagihan', 
    ['as' => 'storetagihan', 'uses' => 'GuestInController@storeTagihan']);
Route::get('destroytagihan/{id}', [
    'as' => 'destroytagihan', 'uses' => 'GuestInController@destroyTagihan']);
Route::get('checkout/{id}/{tagihan}', [
    'as' => 'checkout', 'uses' => 'GuestInController@checkOut']);
Route::get('printbill/{id}', [
    'as' => 'printbill', 'uses' => 'GuestInController@printBill']);

Route::resource('carikamar', 'CariKamarController');

// route manajemen data
Route::resource('kamar', 'KamarController');

Route::resource('barang', 'BarangController');

// Route::resource('pelanggan', 'PelangganController');

// route store keeper
Route::resource('barangmasuk', 'BarangMasukController');

Route::resource('barangkeluar', 'BarangKeluarController');

// route manajer
Route::resource('laporan', 'LaporanController');
// Route::get('printlaptrans', [
//     'as' => 'printlaptrans', 'uses' => 'LaporanController@printLpTransaksi']);
Route::post('printtranstamu', [
        'as' => 'printtranstamu', 'uses' => 'LaporanController@printLpTransaksi']);

// route ajax
Route::get('ajaxkamar',
    ['as' => 'ajaxkamar', 'uses' => 'KamarController@ajaxKamar']
);
Route::get('ajaxreservasi',
    ['as' => 'ajaxreservasi', 'uses' => 'ReservasiController@ajaxReservasi']
);
Route::get('ajaxtamu',
    ['as' => 'ajaxtamu', 'uses' => 'GuestInController@ajaxTamuHotel']
);
Route::get('ajaxbarang',
    ['as' => 'ajaxbarang', 'uses' => 'BarangController@ajaxBarang']
);