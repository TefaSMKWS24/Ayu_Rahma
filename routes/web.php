<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::resource('barang', baranngcontroller::class);
route::resource('data_kasir', data_kasircontroller::class);
route::resource('data_kategori', data_kategoricontroller::class);
route::resource('data_transaksi_', data_transaksicontroller::class);
route::resource('data_pelanggan', data_pelanggancontroller::class);
