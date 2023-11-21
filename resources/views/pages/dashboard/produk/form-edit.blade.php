@extends('layouts.dashboard.page-layout')

@section('konten')
<div class="wrapper-content">
  <h1>Edit Produk</h1>

  <form action="{{ route('dashboard.produk.edit', ['id' => $produks->id_produk]) }}" method="POST">
    @method('PUT')
    <div class="card">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <x-form-input label="Nama Produk" name="nama_produk" value="{{$produks->nama_produk}}"/>
        <x-form-input label="Deskripsi Produk" name="deskripsi_produk" value="{{$produks->deskripsi_produk}}"/>
        <x-form-input label="Harga Produk" name="harga_produk" value="{{$produks->harga_produk}}"/>
        <x-form-input label="Gambar Produk" name="gambar_produk" value="{{$produks->gambar_produk}}"/>
        <x-form-input label="Merek Produk" name="merek_produk" value="{{$produks->merek_produk}}"/>
        <x-form-input label="Tanggal Rilis Produk" name="tanggal_rilis_produk" value="{{$produks->tanggal_rilis_produk}}"/>
      </div>

      <div class="flex items-center justify-center space-x-4">
        <x-button-submit />
        <a href="{{ route('produk.dashboard-produk') }}" class="w-28 btn btn-info block">Batal</a>
      </div>
    </div>
  </form>
</div>
@endsection