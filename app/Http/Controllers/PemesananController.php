<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    /**
     * Dapatkan list semua pemesanan.
     */
    public function pemesanan()
    {
        $pemesananList = Pemesanan::with(['user', 'detail.produk'])
            ->where('user_id', auth()->id()) // list pemesanan user yang login
            ->get();

        // Tampilkan view pemesanan
        return view('pages.shop.pemesanan.list-pemesanan', compact('pemesananList'));
    }

    /**
     * Dapatkan informasi detail pemesanan.
     */
    public function pemesananDetail(Pemesanan $pemesanan)
    {
        $pemesanan->load(['detail', 'user', 'pembayaran']);

        return view('pages.shop.pemesanan.detail-pemesanan', ['pemesanan' => $pemesanan]);
    }

    /**
     * Buat pemesanan.
     */
    public function tambahPemesanan(Keranjang $keranjang)
    {
        // Buat pemesanan baru
        DB::transaction(function () use ($keranjang) {
            $pemesanan = new Pemesanan();
            $pemesanan->user_id = auth()->id();
            $pemesanan->alamat = auth()->user()->alamat;
            $pemesanan->tanggal_pemesanan = now();
            $pemesanan->invoice_number = Pemesanan::buatNomorInvoice(now());
            $pemesanan->status_pemesanan = 'some_value';
            $pemesanan->save();

            // Pindahkan produk dari keranjang ke detail pemesanan
            $detail = new PemesananDetail();
            $detail->produk_id = $keranjang->produk_id;
            $detail->nama_produk = $keranjang->produk->nama;
            $detail->harga_produk =  $keranjang->produk->harga;
            $detail->qty = $keranjang->qty;
            $pemesanan->detail()->save($detail);

            // hapus keranjang
            $keranjang->delete();
        });

        return redirect()->route('shop.pemesanan')->with('success');
    }


}
