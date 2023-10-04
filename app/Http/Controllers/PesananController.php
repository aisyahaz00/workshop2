<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function pesanan()
    {
    return view('pages.shop.Pesanan.pesanan');
    }
}
