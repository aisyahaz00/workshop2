<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function pembayaran()
    {
    return view('pages.shop.pembayaran.pembayaran');
    }
}
