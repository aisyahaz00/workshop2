@extends('layouts.dashboard.halaman-layout')

@section('konten')
<div class="wrapper-content">
    <h1>Buat Produk</h1>

    <form action="{{ route('dashboard.barang.tambah') }}" method="POST">
        <div class="card">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <x-form-input label="Nama" name="nama_produk" />
                <x-form-input label="Deskripsi" name="deskripsi" />
                <x-form-input label="Harga" name="harga" />
                <x-form-input label="Gambar Produk" name="gambar" />
            </div>


            <div class="flex items-center justify-center space-x-4">
                <x-button-submit />
                <a href="{{ route('produk.dashboard-produk') }}" class="w-28 btn btn-info block">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection