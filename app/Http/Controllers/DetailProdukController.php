<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Sesuaikan dengan model yang Anda gunakan
use Illuminate\View\View;

class DetailProdukController extends Controller
{
    public function detailProduk($id)
    {
        // Mengambil data produk berdasarkan ID
        $produk = Produk::find($id);

        // Mengirim data produk ke view
        return view('pages.shop.detailproduk.detail-produk', compact('produk'));
    }
}
