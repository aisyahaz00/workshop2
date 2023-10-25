<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardSellerController extends Controller
{
    public function dashboardSeller()
    {
        return view('pages.dashboard.seller.dashboard-seller');
    }
}
