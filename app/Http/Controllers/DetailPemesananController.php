<?php

namespace App\Http\Controllers;

use App\Models\PemesananDetail;

class DetailPemesananController extends Controller
{
    public function detailPemesanan($id)
    {
        $PemesananDetail = PemesananDetail::with(['produk', 'pemesanan', 'pembayaran'])->find($id);


        if (!$PemesananDetail) {
            return abort(404);

        }

        // Access the relationships
        $detail = new PemesananDetail();
        $detail->produk_id = $keranjang->produk_id;
        $detail->qty = $keranjang->qty;
        $detail->harga_produk = $keranjang->produk->harga_produk;

        $pemesanan->detail()->save($detail);


        // Return a view with the details
        return view('pages.shop.detailpemesanan.detail-pemesanan');
    }


}
