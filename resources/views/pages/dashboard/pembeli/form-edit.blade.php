@extends('layouts.dashboard.page-layout')

@section('konten')
<div class="wrapper-content">
  <h1>Edit</h1>

  <form action="{{ route('dashboard.pembeli.edit', ['id' => $users->id]) }}" method="POST">
    @method('PUT')
    <div class="card">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <x-form-input label="Nama Pengguna" name="nama_pengguna" value="{{$users->nama_pengguna}}"/>
        <x-form-input label="Email Pengguna " name="email" value="{{$users->email}}"/>
        <x-form-input label="No. Handphone Pengguna" name="no_hp_pengguna" value="{{$users->no_hp_pengguna}}"/>
        <x-form-input label="No. Rekening" name="no_rek_pengguna" value="{{$users->no_rek_pengguna}}"/>
        </div>

      <div class="flex items-center justify-center space-x-4">
        <x-button-submit />
        <a href="{{ route('dashboard.pembeli.dashboardPembeli') }}" class="w-28 btn btn-info block">Batal</a>
      </div>
    </div>
  </form>
</div>
@endsection