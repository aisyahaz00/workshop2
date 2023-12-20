@extends('layouts.shop.halaman-layout')

@section('konten')
<div class="container">
    <h1>List Pemesanan</h1>

    @if ($pemesananList->isEmpty())
    <p>Belum ada pemesanan.</p>
    @else
    <!-- Tampilkan konten pemesanan di sini -->
    @foreach($pemesananList as $pemesanan)
    <div class="pemesanan-item">
        <h3>Pemesanan {{ $pemesanan->id }}</h3>
        <p>Tanggal Pemesanan: {{ $pemesanan->tanggal_pemesanan }}</p>
        <p>Total Tagihan: Rp.{{ $pemesanan->totalTagihan() }}</p>

        <!-- Tampilkan detail pemesanan -->
        @foreach($pemesanan->detail as $detail)
        <p>{{ $detail->produk->nama }} - Qty: {{ $detail->qty }} - Subtotal: Rp.{{ $detail->subTotal() }}</p>
        @endforeach

        <!-- Tombol untuk melihat detail pemesanan -->
        <a href="{{ route('shop.pemesanan.detail', ['pemesanan' => $pemesanan]) }}" class="btn btn-info">Detail</a>
    </div>
    @endforeach
    @endif
</div>
@endsection