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
Route::resource('pelanggan', 'PelangganController');
Route::resource('kamar', 'KamarController');
Route::resource('barang', 'BarangController');
// route store keeper
Route::resource('barangmasuk', 'BarangMasukController');
Route::resource('barangkeluar', 'BarangKeluarController');

Route::get('ajaxkamar',
    ['as' => 'ajaxkamar', 'uses' => 'ReservasiController@ajaxKamar']
);
Route::get('ajaxreservasi',
    ['as' => 'ajaxreservasi', 'uses' => 'ReservasiController@ajaxReservasi']
);
Route::get('ajaxtamu',
    ['as' => 'ajaxtamu', 'uses' => 'GuestInController@ajaxTamuHotel']
);