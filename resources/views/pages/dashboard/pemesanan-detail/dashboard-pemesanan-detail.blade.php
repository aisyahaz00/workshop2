@extends('layouts.dashboard.halaman-layout')

@section('konten')
    
    <div class="flex items-center justify-between mb-8">
        <h1>List Pembayaran</h1>
        <a href="{{ route('dashboard.pembayaran.tambah') }}" class="btn btn-primary">Tambah</a>
    </div>

    <table class="table">
        <thead>
            <th class="w-px text-right whitespace-nowrap"> Nama Pengguna</th>
            <th class="text-left"> Email Pengguna</th>
            <th class="text-left"> No. Handphone Pengguna</th>
            <th class="text-left"> No. Rekening</th>
        </thead>
        <x-form-input label="Nama Pengguna" name="nama_pengguna" value="{{$users->nama_pengguna}}"/>
            <x-form-input label="Email Pengguna " name="email" value="{{$users->email}}"/>
            <x-form-input label="No. Handphone Pengguna" name="no_hp_pengguna" value="{{$users->no_hp_pengguna}}"/>
            <x-form-input label="No. Rekening" name="no_rek_pengguna" value="{{$users->no_rek_pengguna}}"/>
        <tbody>
        @foreach ($pembayarans as $pembayarans)
        <td>
            <td class="w-px text-right whitespace-nowrap">{{ $pembayarans->nama_pengguna }}</td>
            <td class="text-left">{{ $users->email }}</td>
            <td class="text-left">{{ $users->no_hp_pengguna }}</td>
            <td class="text-left">{{ $users->no_rek_pengguna }}</td>
        </td>
        @endforeach
    </table>
@endsection

        
                 
                  
   
