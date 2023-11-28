<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DashboardProdukController extends Controller
{
    /**
     * Tampilkan halaman list produk.
     */
    public function dashboardProduk(): View
    {
        $semuaProduk = Produk::get();

        return view('pages.dashboard.produk.dashboard-produk', [
            'semua_produk' => $semuaProduk,
        ]);
    }

    /**
     * Tampilkan halaman form tambah.
     */
    public function formTambah(): View
    {
        return view('pages.dashboard.produk.form-tambah');
    }

    /**
     * Simpan ke database form data yang dikirim.
     */
    public function tambah(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image',
            'harga' => 'required|integer|min:1',
        ]);

        $produk = new Produk();
        $produk->nama = $validated['nama'];
        $produk->deskripsi = $validated['deskripsi'];
        $produk->gambar = $validated['gambar']->hashName();
        $produk->harga = $validated['harga'];
        $produk->save();

        // simpan gambar ke storage.
        Storage::put($produk->path(), $validated['gambar']);

        return redirect()
            ->route('produk.dashboard-produk')
            ->with(['message' => ' Berhasil Simpan ' . $produk->nama]);
    }

    /**
     * Tampilkan halaman form edit.
     */
    public function formEdit(Produk $produk): View
    {
        return view('pages.dashboard.produk.form-edit', [
            'produk' => $produk,
        ]);
    }

    /**
     * Edit produk sesuai data form yang dikirim.
     */
    public function edit(Request $request, Produk $produk): RedirectResponse
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
            ->with(['message' => ' Edit ' . $produk->nama]);
    }

    /**
     * Hapus produk.
     */
    public function hapus(Produk $produk): RedirectResponse
    {
        $produk->delete();

        return redirect()
            ->route('produk.dashboard.produk');
    }

    /**
     * Memulihkan produk.
     */
    public function memulihkan(Produk $produk): RedirectResponse
    {
        $produk->restore();

        return redirect()
            ->route('produk.dashboard.produk');
    }
}
