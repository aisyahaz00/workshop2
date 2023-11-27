@extends('layouts.shop.halaman-layout')
@section('konten')
<div class="container">
    <h1 class="my-4">Pembayaran Pesanan</h1>
    <div class="row">
        <div class="col-md-6">
            <form>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Penerima</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap Anda">
                </div>
                <div class="mb-3">
                    <label for="nomor-kartu" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="nomor-kartu" placeholder="Masukkan Alamat Anda">
                </div>
                <div class="mb-3">
                    <label for="tanggal-exp" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="tanggal-exp" placeholder="Masukkan Nomor Telepon Anda">
                </div>
                <div class="input-group mb-3">
                    <label for="tanggal-exp" class="form-label">Metode Pembayaran</label>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Pilih</button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item" href="#">Shopeepay</a></li>
                      <li><a class="dropdown-item" href="#">BCA</a></li>
                      <li><a class="dropdown-item" href="#">BRI</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Mandiri</a></li>
                    </ul>
                </div>
                <a href="{{ route('pesanan') }}" class="btn btn-primary">Bayar</a>
            </form>
        </div>
        
        <div class="card mb-3" style="max-width: 800px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img class="img-fluid" src="https://images.genius.com/3f8dc4ab7982e94fcad9994842efcd03.1000x1000x1.jpg" alt="Album NCT Dream">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">NCT DREAM - Album Vol.1 [맛 (Hot Sauce)] (Jewel Case Ver.) (Random Ver.)</h5>
                  <p class="card-text">Rp. 160.000</p>
                  <p class="card-text">1</p>
                  <p class="card-text">Rp.160.000</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection