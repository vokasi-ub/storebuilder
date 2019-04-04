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




Route::resource('/', 'KategoriController');

Route::resource('supplierbarang', 'SupplierController');

Route::get('tabel/supplierbarang', 'SupplierController@dataTable')->name('tabel.supplierbarang');

Route::resource('kategoribarang', 'KategoriController');

Route::get('tabel/kategoribarang', 'KategoriController@dataTable')->name('tabel.kategoribarang');

Route::resource('barang', 'BarangController');

Route::get('tabel/barang', 'BarangController@dataTable')->name('tabel.barang');