<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestController;
//use App\Http\Controllers\AuthController;

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
    route::get('/kasir', function() { return view('auth.loginkasir'); })->name('loginkasir');
    route::post('/loginkasir', [AuthController::class, 'loginkasir']);
});
Route::middleware(['guest:admin'])->group(function(){
    route::get('/admin', function() { return view('auth.loginadmin');})->name('loginadmin');
    route::post('/loginadmin',[AuthController::clas,'loginadmin']);
});

//auth (setelah login)
Route::middleware(['auth:kasir'])->group(function(){
    route::get('/kasir/dashboard', [DashboardKasirController::class, 'dashboard']);
    route::get('/kasir/logout', [AuthController::class, 'logoutkasir']);
});

Route::middlewarwe(['auth:admin'])->group(function(){
    Route::get('/admin/dashboard',[DashboardAdminController::class,'dashboard']);
    Route::get('/admin/logout', [AuthController::class, 'logoutadmin']);

    route::resource('barang', 'barangcontroller'::class);
    route::resource('data_kasir', 'data_kasircontroller'::class);
    route::resource('data_kategori','data_kategoricontroller'::class);
    route::resource('data_transaksi_', 'data_transaksicontroller'::class);
    route::resource('data_pelanggan','data_pelanggancontroller'::class);

});
