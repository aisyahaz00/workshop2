<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    /**
     * Display a listing of the user's orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function pemesanan()
    {
        // Get the authenticated user's orders
        $pemesanan = Pemesanan::with('detail')->where('user_id', Auth::id())->latest()->get();

        return view('pages.shop.pemesanan.list-pemesanan', compact('pemesanan'));
    }

    /**
     * Show the details of a specific order.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function tampil(Pemesanan $pemesanan)
    {
        // Make sure the order belongs to the authenticated user
        abort_if($pemesanan->user_id != Auth::id(), 403);

        return view('pages.shop.pemesanan.detail-pemesanan', compact('pemesanan'));
    }

}
