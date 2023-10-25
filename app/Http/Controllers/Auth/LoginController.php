<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function loginRequest(Request $request){
        // Validasi data yang dikirim dari formulir login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba melakukan otentikasi pengguna
        $credentials = $request->only('email', 'password');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            Session::put('role', Auth::user()->role);
            return redirect()->route('home');
        } else {
            // Otentikasi gagal, arahkan kembali ke halaman login dengan pesan kesalahan
            return redirect()->route('login')->with('error', 'Kombinasi email dan kata sandi tidak valid.');
        }
    }
}
