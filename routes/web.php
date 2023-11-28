<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPemesananController;
use App\Http\Controllers\DashboardPemesananDetailController;
use App\Http\Controllers\DashboardProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
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
        Route::get('', 'dashboardProduk')->name('produk.dashboard-produk');
        Route::get('formtambah', 'formTambah')->name('dashboard.produk.formTambah');
        Route::post('tambah', 'tambah')->name('dashboard.produk.tambah');
        Route::get('form-edit/{produk}', 'formEdit')->name('dashboard.produk.form-edit');
        Route::put('edit/{produk}', 'edit')->name('dashboard.produk.edit');
        Route::delete('delete/{produk}', 'delete')->name('dashboard.produk.hapus');
        Route::post('memulihkan/{produk}', 'memulihkan')->name('dashboard.produk.memulihkan');
    });

Route::prefix('dashboard/pemesanandetail')
    ->controller(DashboardPemesananDetailController::class)
    ->group(function () {
        Route::get('', 'dashboardPemesananDetail')->name('detailpemesanan.dashboard-pemesanan-detail');
        Route::get('edit/{pemesananDetail}', 'edit')->name('dashboard.pemesanan-detail.form-edit');
        Route::put('form-edit/{pemesananDetail}', 'update')->name('dashboard.pemesanan-detail.edit');
    });

Route::prefix('dashboard/pemesanan')
    ->controller(DashboardPemesananController::class)
    ->group(function () {
        Route::get('', 'dashboardPemesanan')->name('pemesanan.dashboard-pemesanan');
        Route::get('form-edit/{pemesanan}', 'formEdit')->name('dashboard.pemesanan.form-edit');
        Route::put('edit/{pemesanan}', 'edit')->name('dashboard.pemesanan.edit');
    });






//shop
Route::controller(ShopController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});

Route::controller(ShopController::class)->group(function () {
    Route::get('/detailproduk', 'detailProduk')->name('detailProduk');
});

Route::controller(KeranjangController::class)->group(function () {
    Route::get('/keranjang', 'keranjang')->name('keranjang');
});
Route::get('keranjang/formtambah', [KeranjangController::class, 'formTambah'])
    ->name('keranjang.formTambah');
Route::post('keranjang/tambah', [KeranjangController::class, 'tambah'])
    ->name('keranjang.tambah');
Route::get('keranjang/form-edit', [KeranjangController::class, 'formEdit'])
    ->name('kernajang.form-edit');
Route::put('keranjang/edit', [KeranjangController::class, 'edit'])
    ->name('keranjang.edit');

Route::controller(PesananController::class)->group(function () {
    Route::get('/pesanan', 'pesanan')->name('pesanan');
});
Route::get('pesanan/formtambah', [PesananController::class, 'formTambah'])
    ->name('pesanan.formTambah');
Route::post('pesanan/tambah', [PesananController::class, 'tambah'])
    ->name('pesanan.tambah');
Route::get('pesanan/form-edit', [PesananController::class, 'formEdit'])
    ->name('pesanan.form-edit');
Route::put('pesanan/edit', [PesananController::class, 'edit'])
    ->name('pesanan.edit');

Route::controller(PembayaranController::class)->group(function () {
    Route::get('/pembayaran', 'pembayaran')->name('pembayaran');
});
Route::get('pemabayaran/formtambah', [PembayaranController::class, 'formTambah'])
    ->name('pemabayaran.formTambah');
Route::post('pemabayaran/tambah', [PembayaranController::class, 'tambah'])
    ->name('pemabayaran.tambah');
Route::get('pemabayaran/form-edit', [PembayaranController::class, 'formEdit'])
    ->name('pemabayaran.form-edit');
Route::put('pemabayaran/edit', [PembayaranController::class, 'edit'])
    ->name('pemabayaran.edit');


















Route::get('dashboard/barang/tambah', [BarangController::class, 'formTambah'])
    ->name('dashboard.barang.form-tambah');
Route::post('dashboard/barang/tambah', [BarangController::class, 'tambah'])
    ->name('dashboard.barang.tambah');
