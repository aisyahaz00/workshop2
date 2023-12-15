@extends('layouts.shop.halaman-layout')

@section('konten')
    <div class="container">
        <h1>Keranjang</h1>

        @if ($keranjangItems->isEmpty())
            <p>Keranjang belanja anda kosong.</p>
        @else
            <!-- Tampilkan konten keranjang di sini -->
            @foreach($keranjangItems as $item)
                <p>{{ $item->produk->nama }} - Rp.{{ $item->produk->harga }}</p>
                
                <!-- tambahkan info lain sesuai kebutuhan -->

                <!-- Tombol untuk menghapus item dari keranjang -->
                <form action="{{ route('shop.keranjang.hapus', ['keranjang' => $item]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            @endforeach

            <!-- Tombol Checkout -->
            <form action="{{ route('shop.pemesanan.tambah', ['keranjang' => $item]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Checkout</button>
            </form>
        @endif
    </div>
@endsection
