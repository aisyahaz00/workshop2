<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPembayaranController;
use App\Http\Controllers\DashboardPemesananController;
use App\Http\Controllers\DashboardPemesananDetailController;
use App\Http\Controllers\DashboardProdukController;
use App\Http\Controllers\DetailPemesananController;
use App\Http\Controllers\DetailProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ShopController;
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

//login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'loginRequest')->name('loginRequest');

});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'registerRequest')->name('registerRequest');
});

Route::group(['middleware' => 'web'], function () {
    Route::controller(ShopController::class)->group(function () {
        Route::get('/', 'home')->name('home');
    });
});





//dashboard
Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'halamanUtama')->name('dashboard.halaman-utama');
});

Route::prefix('dashboard/produk')
    ->controller(DashboardProdukController::class)
    ->group(function () {
        Route::get('', 'dashboardProduk')->name('dashboard.produk.list');
        Route::get('formtambah', 'formTambah')->name('dashboard.produk.formTambah');
        Route::post('tambah', 'tambah')->name('dashboard.produk.tambah');
        Route::get('form-edit/{produk}', 'formEdit')
            ->withTrashed()
            ->name('dashboard.produk.form-edit');
        Route::put('edit/{produk}', 'edit')
            ->withTrashed()
            ->name('dashboard.produk.edit');
        Route::post('memulihkan/{produk}', 'memulihkan')
            ->withTrashed()
            ->name('dashboard.produk.memulihkan');
        Route::delete('hapus/{produk}', 'hapus')->name('dashboard.produk.hapus');
    });

Route::prefix('dashboard/pemesanan/{pemesanan}')
    ->controller(DashboardPemesananDetailController::class)
    ->group(function () {
        Route::get('', 'pemesananDetail')->name('dashboard.pemesanan.detail');
    });

Route::prefix('dashboard/pemesanan')
    ->controller(DashboardPemesananController::class)
    ->group(function () {
        Route::get('', 'dashboardPemesanan')->name('pemesanan.dashboard-pemesanan');
        Route::get('form-edit/{pemesanan}', 'formEdit')->name('dashboard.pemesanan.form-edit');
        Route::put('edit/{pemesanan}', 'edit')->name('dashboard.pemesanan.edit');
    });

Route::prefix('dashboard/pembayaran')
    ->controller(DashboardPembayaranController::class)
    ->group(function () {
        Route::get('', 'dashboardPembayaran')->name('dashboard.pemesanan.pembayaran');
        Route::post('/verifikasi/{pembayaran}', [DashboardPembayaranController::class, 'verifikasiPembayaran'])
            ->name(' dashboard.pemesanan.pembayaran.verifikasi');
    });







//shop
Route::controller(ShopController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});


Route::get('/detailproduk/{id}', [DetailProdukController::class, 'detailProduk'])->name('detailProduk');


Route::prefix('/keranjang')
    ->controller(KeranjangController::class)
    ->group(function () {
        Route::get('', 'tampilkanKeranjang')->name('shop.keranjang');
        Route::post('{produk}', 'tambahKeKeranjang')->name('shop.keranjang.tambah');
        Route::get('{produk}', 'tampilkanCheckout')->name('shop.keranjang.checkout');
        Route::delete('{keranjang}', 'hapusDariKeranjang')->name('shop.keranjang.hapus');
    });

Route::prefix('/pemesanan')
    ->controller(PemesananController::class)
    ->group(function () {
        Route::get('', 'pemesanan')->name('shop.pemesanan');
        Route::get('{pemesanan}', 'pemesananDetail')->name('shop.pemesanan.detail');
        Route::post('/shop/tambah-pemesanan/{keranjang}', 'tambahPemesanan')->name('shop.pemesanan.tambah');
    });

Route::get('/pemesanan/detail/{pemesanan}', [DetailPemesananController::class, 'detailPemesanan'])
    ->name('shop.detailPemesanan');
