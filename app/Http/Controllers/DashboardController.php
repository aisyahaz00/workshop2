<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * untuk handle halaman utama
     */
    public function halamanUtama()
    {
        return view('pages.dashboard.beranda.halaman-utama');
    }

}
