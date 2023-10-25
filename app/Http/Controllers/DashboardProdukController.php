<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardProdukController extends Controller
{
    public function dashboardProduk()
    {
        return view('pages.dashboard.produk.dashboard-produk');
    }

}

