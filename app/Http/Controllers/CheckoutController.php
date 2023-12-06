<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        // Ambil data keranjang atau item yang ingin di-checkout
        $keranjangItems = auth()->user()->keranjangItems; // Mengambil item keranjang untuk pengguna yang sedang login

        // Hitung total harga
        $totalHarga = $keranjangItems->sum('subtotal'); // Menghitung total harga berdasarkan subtotal item

        return view('pages.shop.checkout.halaman-checkout', compact('keranjangItems', 'totalHarga'));
    }

}
