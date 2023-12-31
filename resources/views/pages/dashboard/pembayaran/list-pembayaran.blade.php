@extends('layouts.dashboard.halaman-layout')

@section('konten')
    <div class="container mt-5">
        <h1>List Pembayaran</h1>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID Pembayaran</th>
                    <th>ID Pemesanan</th>
                    <th>Total Pembayaran</th>
                    <th>Tanggal Dibuat</th>
                    <th>Status Verifikasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($semuaPembayaran as $pembayaran)
                    <tr>
                        <td>{{ $pembayaran->id }}</td>
                        <td>{{ $pembayaran->pemesanan_id }}</td>
                        <td>Rp. {{ number_format($pembayaran->total, 0, ',', '.') }}</td>
                        <td>{{ $pembayaran->tanggal_dibuat ?: 'Belum Diverifikasi' }}</td>
                        <td>{{ $pembayaran->tanggal_dibuat ? 'Terverifikasi' : 'Belum Terverifikasi' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
