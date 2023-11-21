<?php

namespace App\Http\Controllers;

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
