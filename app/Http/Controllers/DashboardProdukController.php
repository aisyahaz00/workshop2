<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardProdukController extends Controller
{
    public function dashboardProduk()
    {
        $semuaProduk = Produk::get();

        return view('pages.dashboard.produk.dashboard-produk', [
            'semua_produk' => $semuaProduk,
        ]);
    }

    public function formTambah()
    {
        $produks = Produk::get()->map(function ($produks) {
            return [
                'label' => $produks->nama_produk,
                'value' => $produks->id_produk,
            ];
        })->toArray();

        return view('pages.dashboard.produk.form-tambah', ['produks' => $produks]);
    }

    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'nama_produk' => 'required|string|max:100',
            'deskripsi_produk' => 'required|string|max:600',
            'harga_produk' => 'required|float',
            'gambar_produk' => 'required|string',
            'merek_produk' => 'required|string|max:30',
            'tanggal_rilis_produk' => 'required|date',
        ]);

        Produk::insert([
            'id_produk' => $validated['id_produk'],
            'nama_produk' => $validated['nama_produk'],
            'deskripsi_produk' => $validated['deskripsi_produk'],
            'harga_produk' => $validated['harga_produk'],
            'gambar_produk' =>  $validated['gambar_produk'],
            'merek_produk' =>  $validated['merek_produk'],
            'tanggal_rilis_produk' =>  $validated['tanggal_rilis_produk'],
        ]);

        return redirect()
            ->route('produk.dashboard-produk')
            ->with(['message' => ' Berhasil Simpan ' . $validated['nama']]);
    }

    public function formEdit(Produk $produk)
    {
        return view('pages.dashboard.produk.form-edit', [
            'produk' => $produk,
        ]);
    }

    public function edit(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer|min:1',
        ]);

        $produk->nama = $validated['nama'];
        $produk->deskripsi = $validated['deskripsi'];
        $produk->harga = $validated['harga'];
        $produk->save();

        return redirect()
            ->route('produk.dashboard-produk')
            ->with(['message' => ' Edit ' . $validated['nama']]);
    }


}
