@extends('layouts.dashboard.halaman-layout')

@section('konten')
    <div class="container mt-5">
        <h1>Daftar Pembayaran Menunggu Verifikasi</h1>

        @if ($pembayaranMenungguVerifikasi->isEmpty())
            <p>Tidak ada pembayaran yang menunggu verifikasi.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Pembayaran</th>
                        <th>ID Pemesanan</th>
                        <th>Total Pembayaran</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayaranMenungguVerifikasi as $pembayaran)
                        <tr>
                            <td>{{ $pembayaran->id }}</td>
                            <td>{{ $pembayaran->pemesanan_id }}</td>
                            <td>Rp. {{ number_format($pembayaran->total, 0, ',', '.') }}</td>
                            <td>{{ $pembayaran->tanggal_dibuat ?: 'Belum Diverifikasi' }}</td>
                            <td>
                                <form action="{{ route('admin.pembayaran.verifikasi.submit', $pembayaran) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
