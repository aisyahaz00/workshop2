<?php

namespace App\Http\Controllers;

use App\Models\Keranjang; // Sesuaikan dengan model yang Anda gunakan
use App\Models\Produk;

class KeranjangController extends Controller
{
    public function tambahKeKeranjang($id)
    {
        // Ambil produk berdasarkan ID
        $produk = Produk::find($id);

        // Simpan ke dalam keranjang
        Keranjang::create([
            'produk_id' => $produk->id,
            'nama_produk' => $produk->nama,
            'harga' => $produk->harga,
            // tambahkan kolom lain sesuai kebutuhan
        ]);

        return redirect()->route('shop.keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function tampilkanKeranjang()
    {
        // Ambil semua item dalam keranjang
        $keranjangItems = Keranjang::all();

        // Tampilkan view keranjang
        return view('path.ke.keranjang', compact('keranjangItems'));
    }
}
