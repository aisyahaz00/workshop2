<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardPemesananController extends Controller
{
    /**
     * Tampilkan halaman list pemesanan.
     */
    public function dashboardPemesanan(): View
    {
        $semuaPemesanan = Pemesanan::get();

        return view('pages.dashboard.pemenesanan.dashboard-pemesanan', [
            'semua_pemesanan' => $semuaPemesanan,
        ]);
    }

    /**
     * Tampilkan halaman form ubah status.
     */
    public function formEdit(Pemesanan $pemesanan): View
    {
        return view('pages.dashboard.pemenesanan.form-edit', [
            'pemesanan' => $pemesanan,
        ]);
    }

    /**
     * Ubah status pesanan sesuai data form yang dikirim.
     */
    public function edit(Request $request, Pemesanan $pemesanan): RedirectResponse
    {
        $validated = $request->validate([
            'status_pemesanan' => 'required|in:Diterima,Ditolak',
        ]);

        $pemesanan->status_pemesanan = $validated['status_pemesanan'];
        $pemesanan->tanggal_diperbarui = now();
        $pemesanan->save();

        return redirect()
            ->route('pemesanan.dashboard-pemesanan')
            ->with(['message' => 'Ubah Status Pemesanan']);
    }
}
