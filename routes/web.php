<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


//admin
Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'halamanUtama')->name('dashboard.halaman-utama');
});

Route::group(['middleware' => 'web'], function (){
    Route::controller(ShopController::class)->group(function () {
        Route::get('/home', 'home')->name('home');
    });
});
Route::controller(DashboardProdukController::class)->group(function () {
    Route::get('/dashboardproduk', 'dashboardProduk')->name('produk.dashboard-produk');
});

//pembeli
Route::controller(KeranjangController::class)->group(function () {
    Route::get('/keranjang', 'keranjang')->name('keranjang');
});

Route::controller(PesananController::class)->group(function () {
    Route::get('/pesanan', 'pesanan')->name('pesanan');
});

Route::controller(PembayaranController::class)->group(function () {
    Route::get('/pembayaran', 'pembayaran')->name('pembayaran');
});


//seller
Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboardseller', 'halamanUtama')->name('dashboard.halaman-utama');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'loginRequest')->name('loginRequest');

});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'registerRequest')->name('registerRequest');
});
