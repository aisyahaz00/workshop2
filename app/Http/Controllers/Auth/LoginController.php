<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.halaman-login');
    }

    public function loginRequest(Request $request)
    {
        // Validasi data yang dikirim dari formulir login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        // Coba melakukan otentikasi pengguna
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            info(auth()->check());

            /** @var User */
            $user = auth()->user();

            if ($user->role === 'admin') {
                return redirect()->route('dashboard.halaman-utama');
            }

            return redirect()->route('home');
        }

        // Otentikasi gagal, arahkan kembali ke halaman login dengan pesan kesalahan
        return redirect()->route('login')->with('error', 'Kombinasi email dan kata sandi tidak valid.');

    }
}
