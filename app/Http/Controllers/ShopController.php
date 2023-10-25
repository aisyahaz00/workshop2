<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    /**
     * Halaman home.
     */
    public function home()
    {
        $role = Session::get('role');
        if ($role == 'pembeli') {
            return view('pages.shop.beranda.halaman-utama');
        } elseif ($role == 'penjual'){
            return view('pages.shop.beranda.halaman-utama');
        } else {
            
        }

    }
}
