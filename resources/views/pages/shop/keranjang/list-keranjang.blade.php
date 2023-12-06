@extends('layouts.shop.halaman-layout')


@section('konten')
    <div class="container">
        <h1>Keranjang</h1>

        @if ($keranjangItems->isEmpty())
            <p>Keranjang belanja anda kosong.</p>
        @else

       
@else
    <!-- Tampilkan tabel atau item keranjang di sini -->
    <!-- ... -->
@endif
<!-- Tampilkan konten keranjang di sini -->
<h1>Keranjang Belanja</h1>
@foreach($keranjangItems as $item)
    <p>{{ $item->nama_produk }} - Rp.{{ $item->harga }}</p>
    <!-- tambahkan info lain sesuai kebutuhan -->
@endforeach
        
        @endif
    </div>
@endsection

