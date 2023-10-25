@extends('layouts.dashboard.halaman-layout')

@section('konten')
    <h1>Pesanan</h1>

    <table>
        <tr>
            <th>Pesanan ID</th>
            <th>Seller</th>
            <th>Produk</th>
            <th>Pembeli</th>
            <th>Jumlah</th>
            <th>Harga</th>
        </tr>

        @foreach ($pesananAdmin as $pesanan)
        <tr>
            <td>{{ $pesanan->id }}</td>
            <td>{{ $pesanan->seller->nama }}</td>
            <td>{{ $pesanan->produk->nama_produk }}</td>
            <td>{{ $pesanan->pembeli->nama }}</td>
            <td>{{ $pesanan->jumlah }}</td>
            <td>{{ $pesanan->harga }}</td>
            <td>
                <a href="{{ route('pesanan.show', ['id' => $pesanan->id]) }}" class="btn btn-info">Lihat</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
