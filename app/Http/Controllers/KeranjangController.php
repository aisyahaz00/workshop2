<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the shopping cart items for the authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function keranjang()
    {
        // Get the authenticated user's shopping cart items
        $keranjangItems = Keranjang::with('produk')->where('user_id', Auth::id())->get();

        // You can customize this view based on your requirements
        return view('pages.shop.keranjang.list-keranjang', compact('keranjangItems'));
    }

    /**
     * Update the quantity of a shopping cart item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function formEdit(Request $request, Keranjang $keranjang)
    {
        // Validate the request
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        // Update the quantity of the shopping cart item
        $keranjang->edit([
            'qty' => $request->input('qty'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'berhasil');
    }

    /**
     * Remove the specified item from the shopping cart.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function hapus(Keranjang $keranjang)
    {
        // Delete the shopping cart item
        $keranjang->delete();
    }
}
