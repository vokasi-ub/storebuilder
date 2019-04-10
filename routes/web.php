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

Route::resource('supplierbarang', 'SupplierController');
Route::get('data/supplierbarang', 'SupplierController@index')->name('data.supplierbarang');
Route::get('tabel/supplierbarang', 'SupplierController@dataTable')->name('tabel.supplierbarang');

Route::resource('kategoribarang', 'KategoriController');
Route::get('data/kategoribarang', 'KategoriController@index')->name('data.kategoribarang');
Route::get('tabel/kategoribarang', 'KategoriController@dataTable')->name('tabel.kategoribarang');

Route::resource('barang', 'BarangController', [
	'except' => ['create']
]);
Route::get('data/barang', 'BarangController@index')->name('data.barang');
Route::get('tabel/barang', 'BarangController@dataTable')->name('tabel.barang');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
