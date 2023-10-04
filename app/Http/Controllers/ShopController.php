<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Halaman home.
     */
    public function home()
    {
        return view('pages.shop.beranda.halaman-utama');
    }
}
