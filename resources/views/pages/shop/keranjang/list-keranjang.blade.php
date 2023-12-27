@extends('layouts.shop.halaman-layout')

@section('konten')
    <div class="container mt-5">
        <h1 class="mb-4">Keranjang Belanja</h1>
        @if ($keranjangItems->isEmpty())
            <p>Keranjang belanja Anda kosong.</p>
        @else
            @foreach($keranjangItems as $item)
                <div class="card">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                        <div class="order-md-2 text-center">
                            <div class="form-check mb-3 mb-md-0">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <h5 class="card-title">{{ $item->produk->nama }}</h5>
                                </label>
                            </div>
                            <div>
                                <img src="{{ $item->produk->gambar }}" class="card-img-top" alt="gambar produk" style="width: 18rem">
                            </div>
                        </div>  

                        <div class="order-md-2">
                            <div class="ml-md-4">
                                <p class="card-text mb-2 mt-0">{{ $item->produk->deskripsi }}</p>
                                <p class="card-text mb-3">Rp.{{ $item->produk->harga }}</p>
                            </div>
                            <div class="ml-md-auto d-flex justify-content-end">
                                <form action="{{ route('shop.keranjang.hapus', ['keranjang' => $item]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div> 
                    </div> 
            
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="justify-content-start">Total Pesanan: Rp. {{ $item->subtotal }}</span>
                        <form action="{{ route('shop.pemesanan.tambah', ['keranjang' => $item]) }}" method="post">
                            @csrf
                            <!-- Tambahkan input hidden untuk menyimpan subtotal -->
                            <input type="hidden" name="subtotal" value="{{ $item->subtotal }}">
                            <button type="submit" class="btn btn-primary ml-auto">Checkout</button>
                        </form>
                    </div>                       
                </div>
            @endforeach
        @endif
    </div>
@endsection
