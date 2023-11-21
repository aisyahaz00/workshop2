<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * untuk handle halaman utama
     */
    public function halamanUtama()
    {
        $produks = DB::table('produks')
            ->groupBy('id_produk')
            ->get();

        return view('pages.dashboard.beranda.halaman-utama', [
            'produks' => $produks,
        ]);
    }
}
