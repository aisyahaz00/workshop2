@extends('layouts.dashboard.halaman-layout')

@section('konten')
    <h1>Pesanan</h1>

    <a href="{{ route('pesanan.create') }}" class="btn btn-primary">Tambah Pesanan</a>

    <table>
        <tr>
            <th>Nama Pembeli</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
        </tr>

        @foreach ($pesananPenjual as $pesanan)
            <tr>
                <td>{{ $pesanan->pembeli->nama }}</td>
                <td>{{ $pesanan->produk->nama_barang }}</td>
                <td>{{ $pesanan->jumlah }}</td>
                <td>{{ $pesanan->total_harga }}</td>
                <td>
                    <a href="{{ route('pesanan.show', ['id' => $pesanan->id]) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('pesanan.edit', ['id' => $pesanan->id]) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('pesanan.destroy', ['id' => $pesanan->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
