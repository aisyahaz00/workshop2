<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use App\Models\PemesananPembayaran;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardPemesananDetailController extends Controller
{
    /**
     * Tampilkan halaman detail pesanan.
     */
    public function pemesananDetail(Pemesanan $pemesanan): View
    {
        $pengguna = User::where('id', $pemesanan->user_id)->first();
        $semuaPemesananDetail = PemesananDetail::where('pemesanan_id', $pemesanan->id)->get();
        $semuaPemesananPembayaran = PemesananPembayaran::where('pemesanan_id', $pemesanan->id)->get();

        return view('pages.dashboard.pemesanan-detail.detail', [
            'pemesanan' => $pemesanan,
            'semua_pemesanan_detail' => $semuaPemesananDetail,
            'semua_pemesanan_pembayaran' => $semuaPemesananPembayaran,
            'pengguna' => $pengguna,
        ]);
    }

    /**
     * Tampilkan halaman form edit pembayaran.
     */
    public function formTambah(): View
    {
        // Menampilkan halaman form tambah jika diperlukan
        return view('pages.dashboard.pemesanan-detail.form-edit');
    }

    /**
     * Simpan ke database form data pembayaran yang dikirim.
     */
    public function tambah(Request $request): RedirectResponse
    {
        // Menangani logika untuk menyimpan data pembayaran jika diperlukan

        return redirect()
            ->route('detailpemesanan.dashboard-pemesanan-detail')
            ->with(['message' => 'Berhasil Simpan Pembayaran Pemesanan']);
    }
}
