<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use Illuminate\Http\Request;

class HalamanCheckoutController extends Controller
{
    public function index()
    {
        $keranjangItems = auth()->user()->keranjang()->with('produk')->get();

        return view('checkout.index', compact('keranjangItems'));
    }

    public function checkout(Request $request)
    {
        // Implement the checkout logic here
        // Create a new Pemesanan (Order) record
        $pemesanan = new Pemesanan([
            'user_id' => auth()->id(),
            'total_harga' => 0, // You need to calculate the total price
            'status_pemesanan' => 'Menunggu Pembayaran', // Adjust the status accordingly
            'tanggal_pesan' => now(),
            'tanggal_diperbarui' => now(),
        ]);

        $pemesanan->save();

        // Loop through items in the cart and create PemesananDetail records
        foreach (auth()->user()->keranjang as $keranjangItem) {
            $pemesananDetail = new PemesananDetail([
                'pemesanan_id' => $pemesanan->id,
                'produk_id' => $keranjangItem->produk_id,
                'qty' => $keranjangItem->qty,
                'harga_produk' => $keranjangItem->produk->harga,
            ]);

            $pemesananDetail->save();
        }

        // Clear the user's cart after successful checkout
        auth()->user()->keranjang()->delete();

        return redirect()->route('pemesanan.index')->with('success', 'Checkout successful!');
    }

    // Add this method to handle updating the quantity in the cart
    public function updateQty(Request $request, Keranjang $keranjangItem)
    {
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $keranjangItem->update(['qty' => $request->qty]);

        return redirect()->back()->with('success', 'Quantity updated successfully!');
    }
}
