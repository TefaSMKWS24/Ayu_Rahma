<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestController;
use App\Http\Controllers\authcontroller;

use App\Http\Controllers\baranngcontroller;
use App\Http\Controllers\data_kasircontroller;
use App\Http\Controllers\data_kategoricontroller;
use App\Http\Controllers\data_transaksicontroller;
use App\Http\Controllers\data_pelanggancontroller;


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

//guest (sebelum login)
Route::middleware(['guest:kasir'])->group(function(){
    route::get('/kasir', function() { returnview('auth.loginkasir'); })->name('loginkasir');
    route::post('/loginkasir', [authcontroller::class, 'loginkasir']);
});
Route::middleware(['guest:admin'])->group(function(){
    route::get('/admin', function() { return view( 'auth.loginadmin'); })->name('loginadmin');
    route::post('/loginadmin',[authcontroller::clas,'loginadmin']);
});

//auth (setelah login)
Route::middleware('auth:kasir')->group(function(){
    route::get('/kasir/dashboard', [dashboardadmincontroller::class, 'dashboard']);
    route::get('/kasir/logout', [authcontroller::class, 'logoutkasir']);
});

Route::middlewarwe('auth:kasir')->group(funcition)(){
    route::get('/admin/dashboard', [dashboardadmincontroller::class, 'dashboard']);
    route::get('/admin/logout', [authcontroller::class, 'logoutkasir']);

    route::resource('barang', 'baranngcontroller'::class);
    route::resource('data_kasir', 'data_kasircontroller'::class);
    route::resource('data_kategori','data_kategoricontroller'::class);
    route::resource('data_transaksi_', 'data_transaksicontroller'::class);
    route::resource('data_pelanggan','data_pelanggancontroller'::class);

};
