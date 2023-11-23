<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPembeliController;
use App\Http\Controllers\DashboardPesananController;
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
    });

Route::controller(DashboardPesananController::class)->group(function () {
    Route::get('/dashboard/pesanan', 'dashboardPesanan')->name('pesanan.dashboard-pesanan');
});
Route::get('dashboard/pesanan/formtambah', [DashboardPesananController::class, 'formTambah'])
    ->name('dashboard.pesanan.formTambah');
Route::post('dashboard/pesanan/tambah', [DashboardPesananController::class, 'tambah'])
    ->name('dashboard.pesanan.tambah');
Route::post('dashboard/pesanan/delete', [DashboardPesananController::class, 'delete'])
    ->name('dashboard.pesanan.delete');
Route::get('dashboard/pesanan/form-edit', [DashboardPesananController::class, 'formEdit'])
    ->name('dashboard.pesanan.form-edit');
Route::put('dashboard/pesanan/{id}/edit', [DashboardPesananController::class, 'edit'])
    ->name('dashboard.pesanan.edit');


Route::get('dashboard/pembeli', [PembeliController::class, 'halamanPembeli'])
    ->name('dashboard.pembeli.dashboardPembeli');
Route::get('dashboard/pembeli/formtambah', [PembeliController::class, 'formTambah'])
    ->name('dashboard.pembeli.formTambah');
Route::post('dashboard/pembeli/tambah', [PembeliController::class, 'tambah'])
    ->name('dashboard.pembeli.tambah');
Route::get('dashboard/pembeli/form-edit', [DashboardPembeliController::class, 'formEdit'])
    ->name('dashboard.pembeli.form-edit');
Route::put('dashboard/pembeli//edit', [DashboardPembeliController::class, 'edit'])
    ->name('dashboard.pembeli.edit');



//shop
Route::controller(ShopController::class)->group(function () {
    Route::get('/', 'home')->name('home');
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
