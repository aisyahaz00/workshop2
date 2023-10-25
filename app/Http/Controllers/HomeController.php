<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if ( !Auth::user()) {
            return redirect(route('login'));
        }
        $role = Auth::user()->role;
        if ($role == 'pembeli') {
            dd('pembeli');
        } else if ($role == 'penjual'){
            dd('penjual');
        } else {
            return redirect(route('login'));
        }
    }
}
