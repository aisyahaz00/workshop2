@extends('layouts.dashboard.halaman-layout')

@section('konten')
    <h1>Produk</h1>
    
    <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>

    <table>
        <tr>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Tindakan</th>
        </tr>
       
        @foreach ($produkPenjual as $produk)
        <tr>
            <td>{{ $produk->nama_barang }}</td>
            <td>{{ $produk->harga }}</td>
            <td>
                <a href="{{ route('produk.show', ['id' => $produk->id]) }}" class="btn btn-info">Lihat</a>
                <a href="{{ route('produk.edit', ['id' => $produk->id]) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('produk.destroy', ['id' => $produk->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
            </td>
        </tr>
        @endforeach
    </table>
@endsection

         