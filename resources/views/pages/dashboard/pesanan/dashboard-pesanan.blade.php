@extends('layouts.dashboard.halaman-layout')

@section('konten')
    
    <div class="flex items-center justify-between mb-8">
        <h1>List Pesanan</h1>
        <a href="{{ route('dashboard.pesanan.formTambah') }}" class="btn btn-primary">Tambah</a>
    </div>

    <table class="table">
        <thead>
            <th class="w-px text-right whitespace-nowrap"> ID Pemesanan</th>
            <th class="text-left"> Jumlah Produk Pemesanan</th>
            <th class="text-left"> Tanggal Pemesanan</th>
            <th class="text-left"> Tanggal Pemesanan</th>
            <th class="text-left"> Sub Total Pemesanan</th>
        </thead>
        <tbody>
        @foreach ($pemesanans as $pemesanans)
        <tr>
            <td class="w-px text-right whitespace-nowrap">{{ $pemesanans->id_pemesanan }}</td>
            <td class="text-left">{{ $pemesanans->jumlah_produk_pemesanan }}</td>
            <td class="text-left">{{ $pemesanans->tanggal_pemesanan }}</td>
            <td class="text-left">{{ $pemesanans->sub_total_pemesanan }}</td>
        </tr>
        @endforeach
    </table>
@endsection

        
                 
                  
   
