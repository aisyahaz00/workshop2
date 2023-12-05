<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class ShopController extends Controller
{
    /**
     * Halaman home.
     */
    public function home()
    {
        $produk = Produk::all();

        // Pass the products to the view
        return view('pages.shop.beranda.halaman-utama', compact('produk'));
    }

}
