<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardPembayaranController extends Controller
{
    public function dashboardPembayaran()
    {
        $pembayarans = DB::table('pembayarans')
            ->get();

        return view('pages.dashboard.pembayaran.dashboard-pembayaran', [
            'pembayarans' => $pembayarans,
        ]);
    }

    public function formTambah()
    {
        $pembayarans = DB::table('pembayarans')->get()->map(function ($pembayarans) {
            return [
                'label' => $pembayarans->id_pembayaran,
                'value' => $pembayarans->id_pembayaran,
            ];
        })->toArray();

        return view('pages.dashboard.pembayaran.form-tambah', ['pembayarans' => $pembayarans]);
    }

    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'id_pembayaran' => 'required|exists:pembayaran,id_pembayaran',
            'total_pembayaran' => 'required|float',
            'tanggal_pembayaran' => 'required|date',
            'status_pembayaran' => 'required|float',
        ]);

        DB::table('pembayarans')->insert([
            'id_pembayaran' => $validated['id_pembayaran'],
            'total_pembayaran' => $validated['total_pembayaran'],
            'tanggal_pembayaran' => $validated['tanggal_pembayaran'],
            'status_pembayaran' => $validated['status_pembayaran'],
        ]);

        return redirect()
            ->route('dashboard.pembayaran.dashboardPembayaran')
            ->with(['message' => ' Berhasil Simpan ']);
    }

}
