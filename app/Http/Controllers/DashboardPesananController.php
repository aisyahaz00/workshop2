<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPesananController extends Controller
{
    public function dashboardPesanan()
    {
        return view('pages.dashboard.pesanan.dashboard-pesanan');
    }
}
