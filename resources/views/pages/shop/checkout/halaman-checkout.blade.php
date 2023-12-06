<!-- resources/views/pages/shop/checkout.blade.php -->

@extends('layouts.shop.halaman-layout')

@section('konten')
    <div class="container">
        <h1>Checkout</h1>

        @if ($keranjangItems->isEmpty())
            <p>Keranjang belanja anda kosong.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keranjangItems as $item)
                        <tr>
                            <td>{{ $item->produk->nama }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>Rp.{{ $item->subtotal }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2"><strong>Total:</strong></td>
                        <td><strong>Rp.{{ $totalHarga }}</strong></td>
                    </tr>
                </tbody>
            </table>
            
            <!-- Formulir Checkout -->
            <form action="{{ route('shop.checkout.process') }}" method="post">
                @csrf
                <!-- Tambahkan input atau elemen formulir lainnya sesuai kebutuhan -->
                <button type="submit" class="btn btn-primary">Checkout</button>
            </form>
        @endif
    </div>
@endsection
