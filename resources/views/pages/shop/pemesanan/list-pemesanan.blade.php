@extends('layouts.shop.halaman-layout')

@section('konten')
    <div class="container mt-5">
        <h1 class="mb-4">List Pemesanan</h1>

        @if ($pemesananList->isEmpty())
            <p>Belum ada pemesanan.</p>
        @else
            <!-- Tampilkan konten pemesanan di sini -->
            @foreach($pemesananList as $pemesanan)
                <div class="card mb-4">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                        <div class="order-md-2 text-center">
                            <div>
                                <h5 class="card-title text-start">Pemesanan {{ $pemesanan->id }}</h5>
                            </div>
                        </div>

                        <div class="order-md-2">
                            <div class="ml-md-4">
                                <p>Tanggal Pemesanan: {{ $pemesanan->tanggal_pemesanan }}</p>
                                <p>Total Tagihan: Rp.{{ $pemesanan->totalTagihan() }}</p>

                                <!-- Tampilkan detail pemesanan -->
                                @foreach($pemesanan->detail as $detail)
                                    <p>{{ $detail->produk->nama }} - Qty: {{ $detail->qty }} - Subtotal: Rp.{{ $detail->subTotal() }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="justify-content-start">{{ $pemesanan->detail->count() }} Produk</span>
                        <span class="justify-content-end">Total Pesanan: Rp. {{ $pemesanan->totalTagihan() }}</span>
                    </div>

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="justify-content-start">{{ $pemesanan->status }}</span>
                        <a href="{{ route('shop.detailPemesanan', ['pemesanan' => $pemesanan]) }}" class="btn btn-info ml-auto">Detail</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
