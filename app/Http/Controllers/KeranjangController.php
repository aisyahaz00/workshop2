<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;

class KeranjangController extends Controller
{
    /**
     * Tampilkan list keranjang.
     */
    public function tampilkanKeranjang()
    {
        // Ambil semua item dalam keranjang
        $keranjangItems = Keranjang::with(['produk', 'user'])->get();

        // Tampilkan view keranjang
        return view('pages.shop.keranjang.list-keranjang', compact('keranjangItems'));
    }

    // tampilanCheckOut
    public function tampilkanCheckout()
    {
        $keranjangItems = Keranjang::with(['produk', 'user'])->get();

        return view('pages.shop.checkout', compact('keranjangItems'));
    }

    /**
     * Hapus item dari keranjang.
     */
    public function hapusDariKeranjang(Keranjang $keranjang)
    {
        $keranjang->delete();

        return redirect()->route('shop.keranjang')->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    /**
     * Tambahkan produk ke keranjang.
     */
    public function tambahKeKeranjang(Produk $produk)
    {
        $keranjang = new Keranjang();
        $keranjang->produk_id = $produk->id;
        $keranjang->user_id = auth()->id();
        $keranjang->qty = 1;
        $keranjang->save();


        return redirect()->route('shop.keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }
}
