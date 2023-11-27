@extends('layouts.dashboard.halaman-layout')

@section('konten')
<div class="wrapper-content">
  <h1>Edit Produk</h1>

  <form action="{{ route('dashboard.produk.edit', ['produk' => $produk]) }}" method="POST">
    @method('PUT')
    <div class="card">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <x-form-input label="Nama Produk" name="nama" value="{{$produk->nama}}" />
        <x-form-input label="Deskripsi Produk" name="deskripsi" value="{{$produk->deskripsi}}" />
        <x-form-input label="Harga Produk" name="harga" value="{{$produk->harga}}" />
        {{--
        <x-form-input label="Gambar Produk" name="gambar_produk" value="{{$produk->gambar_produk}}" /> --}}
      </div>

      <div class="flex items-center justify-center space-x-4">
        <x-button-submit />
        <a href="{{ route('produk.dashboard-produk') }}" class="w-28 btn btn-info block">Batal</a>
      </div>
    </div>
  </form>
</div>
@endsection