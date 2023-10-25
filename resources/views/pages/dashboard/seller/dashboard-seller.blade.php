@extends('layouts.dashboard.halaman-layout')

@section('konten')
    <h1>Seller</h1>

    <table>
        <tr>
            <th>Nama Seller</th>
            <th>Produk yang Dijual</th>
        </tr>

        @foreach ($sellers as $seller)
        <tr>
            <td>{{ $seller->nama }}</td>
            <td>
                @foreach ($seller->produk as $produk)
                    {{ $produk->nama_produk }}
                @endforeach
            </td>
            <td>
                <a href="{{ route('tambah.seller', ['seller_id' => $seller->id]) }}" class="btn btn-primary">Tambah Seller</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
