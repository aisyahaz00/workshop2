@extends('layouts.dashboard.halaman-layout')

@section('konten')
    <h1>Daftar Pemesanan</h1>

    <table>
        <thead>
            <tr>
                <th>Invoice Number</th>
                <th>Status Pemesanan</th>
                <th>Tanggal Pemesanan</th>
                <th>Tanggal Diperbarui</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($semua_pemesanan as $pemesanan)
                <tr>
                    <td>{{ $pemesanan->invoice_number }}</td>
                    <td>{{ $pemesanan->status_pemesanan }}</td>
                    <td>{{ $pemesanan->tanggal_pemesanan }}</td>
                    <td>{{ $pemesanan->tanggal_diperbarui }}</td>
                    <td>
                        <a href="{{ route('detailpemesanan.dashboard-pemesanan-detail', $pemesanan) }}">Detail</a>
                        <a href="{{ route('dashboard.pemesanan-detail.form-edit', $pemesanan) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

        
                 
                  
   
