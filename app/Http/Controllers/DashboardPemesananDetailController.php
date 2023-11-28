<?php

namespace App\Http\Controllers;

use App\Models\PemesananDetail;
use App\Models\PemesananPembayaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardPemesananDetailController extends Controller
{
    public function dashboardPemesananDetail(): View
    {
        $semuaPemesananDetail = PemesananDetail::get();

        return view('pages.dashboard.pemesanan-detail.dashboard-pemesanan-detail', [
            'semua_pemesanan_detail' => $semuaPemesananDetail,
        ]);
    }

    public function dashboardPemesananPembayaran(): View
    {
        $semuaPemesananPembayaran = PemesananPembayaran::get();

        return view('pages.dashboard.pemesanan-detail.dashboard-pemesanan-detail', [
            'semua_pemesanan_pembayaran' => $semuaPemesananPembayaran,
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
