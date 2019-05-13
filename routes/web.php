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




/*Route::resource('/', 'KategoriController');*/

/** Route Login */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
/** --------------------- */

/** Route Supplier Barang */
Route::resource('supplierbarang', 'SupplierController');
Route::get('data/supplierbarang', 'SupplierController@index')->name('data.supplierbarang');
Route::get('tabel/supplierbarang', 'SupplierController@dataTable')->name('tabel.supplierbarang');
/** --------------------- */

/** Route Kategori Barang */
Route::resource('kategoribarang', 'KategoriController');
Route::get('data/kategoribarang', 'KategoriController@index')->name('data.kategoribarang');
Route::get('tabel/kategoribarang', 'KategoriController@dataTable')->name('tabel.kategoribarang');
/** --------------------- */

/** Route Barang */
Route::resource('barang', 'BarangController', [
	'except' => ['create']
]);
Route::get('data/barang', 'BarangController@index')->name('data.barang');
Route::get('tabel/barang', 'BarangController@dataTable')->name('tabel.barang');
/** --------------------- */


/** Route Supplai Barang */
Route::resource('supplaibarang', 'SupplaiController', [
	'except' => ['create']
]);
Route::get('data/supplaibarang', 'SupplaiController@index')->name('data.supplaibarang');
Route::get('tabel/supplaibarang', 'SupplaiController@dataTable')->name('tabel.supplaibarang');
/** --------------------- */


/** Route Transaksi Barang */
Route::resource('transaksibarang', 'TransaksiController', [
	'except' => ['create']
]);
Route::get('data/transaksibarang', 'TransaksiController@index')->name('data.transaksibarang');
Route::get('tabel/transaksibarang', 'TransaksiController@dataTable')->name('tabel.transaksibarang');
/** --------------------- */


Route::get('charts', 'ChartController@index')->name('chart.index');
Route::get('gmap', 'GmapController@index')->name('gmap.index');


Route::get('export', 'BarangController@export')->name('export');

Route::get('importExportView', 'BarangController@importExportView');

Route::post('import', 'BarangController@import')->name('import');