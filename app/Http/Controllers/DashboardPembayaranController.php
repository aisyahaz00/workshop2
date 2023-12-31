<?php

namespace App\Http\Controllers;

use App\Models\PemesananPembayaran;
use Illuminate\Http\Request;

class DashboardPembayaranController extends Controller
{
    public function dashboardPembayaran()
    {
        $semuaPembayaran = PemesananPembayaran::get();

        return view('pages.dashboard.pembayaran.list-pembayaran', [
            'semuaPembayaran' => $semuaPembayaran, // Ubah variabel menjadi $semuaPembayaran
        ]);
    }

    /**
     * Menampilkan daftar pemesanan yang menunggu verifikasi pembayaran.
     *
     */
    public function daftarVerifikasiPembayaran()
    {
        $pembayaranMenungguVerifikasi = PemesananPembayaran::whereNull('tanggal_dibuat')->get();

        return view('admin.pembayaran.verifikasi', compact('pembayaranMenungguVerifikasi'));
    }

    /**
     * Verifikasi pembayaran dan update status.
     */
    public function verifikasiPembayaran(Request $request, PemesananPembayaran $pembayaran)
    {
        // Lakukan verifikasi pembayaran
        $pembayaran->tanggal_dibuat = now();
        $pembayaran->admin_id = auth()->id(); // Atau sesuai dengan cara Anda mengidentifikasi admin
        $pembayaran->save();

        // Update status pemesanan atau lakukan tindakan lain sesuai kebutuhan

        return redirect()->route('admin.pembayaran.verifikasi')->with('success', 'Pembayaran berhasil diverifikasi.');
    }
}
