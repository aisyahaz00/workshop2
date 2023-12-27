@extends('layouts.shop.halaman-layout')

@section('konten')
    <div class="container mt-5">
        <h1 class="mb-4">Detail Pemesanan</h1>

        <div class="card">
            <div class="card-body">
                <h3>Pemesanan {{ $pemesanan->id }}</h3>
                <p>Tanggal Pemesanan: {{ $pemesanan->tanggal_pemesanan }}</p>
                <p>Alamat Pengiriman: {{ $pemesanan->alamat }}</p>
                <p>Status Pemesanan: {{ $pemesanan->status_pemesanan }}</p>

                <h4>Detail Produk:</h4>
                @foreach($pemesanan->detail as $detail)
                    <p>{{ $detail->produk->nama }} - Qty: {{ $detail->qty }} - Subtotal: Rp.{{ $detail->subTotal() }}</p>
                @endforeach

                <h4>Informasi Pembayaran:</h4>
                @foreach($pemesanan->pembayaran as $pembayaran)
                    <p>Total Pembayaran: Rp.{{ $pembayaran->total }}</p>
                    <p>Tanggal Dibuat: {{ $pembayaran->tanggal_dibuat }}</p>
                    <p>Tanggal Diperbarui: {{ $pembayaran->tanggal_diperbarui }}</p>
                    <p>Admin: {{ $pembayaran->admin->name }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
