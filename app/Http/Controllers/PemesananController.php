<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    public function pemesanan()
    {
        // Ambil semua pemesanan
        $pemesananList = Pemesanan::with(['user', 'produk', 'detail'])->get();

        // Tampilkan view pemesanan
        return view('pages.shop.pemesanan.list-pemesanan', compact('pemesananList'));
    }

    // buat pemesanan
    public function tambahPemesanan(Keranjang $keranjang)
    {
        // Buat pemesanan baru
        $pemesanan = new Pemesanan();
        $pemesanan->user_id = auth()->id();
        $pemesanan->alamat = auth()->user()->alamat;
        $pemesanan->tanggal_pemesanan = now();
        $pemesanan->save();

        // Pindahkan produk dari keranjang ke detail pemesanan
        $pemesanan->detail()->create([
            'produk_id' => $keranjang->produk_id,
            'qty' => $keranjang->qty,
            'harga_produk' => $keranjang->produk->harga,
        ]);

        return redirect()->route('shop.pemesanan')->with('success');
    }


}
