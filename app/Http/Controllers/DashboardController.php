<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * untuk handle halaman utama
     */
    public function halamanUtama()
    {
        return view('pages.dashboard.beranda.halaman-utama', [
            'total_produk' => Produk::count(),
            'total_pemesanan' => Pemesanan::count(),
            'total_customer' => User::where('role', 'pembeli')->count(),
        ]);
    }
}
