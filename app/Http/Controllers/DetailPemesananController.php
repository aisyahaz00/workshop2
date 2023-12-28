<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;

class DetailPemesananController extends Controller
{
    /**
     * Menampilkan detail pemesanan.
     */
    public function detailPemesanan(Pemesanan $pemesanan)
    {
        $pemesanan->load(['detail', 'user', 'pembayaran']);

        return view('pages.shop.pemesanan.detail-pemesanan', ['pemesanan' => $pemesanan]);
    }
}
