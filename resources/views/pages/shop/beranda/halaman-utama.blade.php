@extends('layouts.shop.halaman-layout')

@section('konten')

<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="https://i.pinimg.com/736x/cd/aa/bd/cdaabd48792d3a2aa2c0d6cffe11fb06--pop-albums-the-artist.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h1 class="display-3 text-white mb-4 animated slideInDown">SELAMAT DATANG</h1>
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Almerch</h5>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="https://i.pinimg.com/736x/cd/aa/bd/cdaabd48792d3a2aa2c0d6cffe11fb06--pop-albums-the-artist.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h6 class="text-white mb-3 animated slideInDown">Toko album 'ALMERCH' sangat terpercaya. Hanya di Almerch teman-teman bisa membeli album dengan mudah, tanpa kesulitan!</h6>
                        <h5 class="text-white mb-3 animated slideInDown">YUK BURUAN BELI!</h5>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container-fluid">
    <div class="row g-4">
        @foreach($produk as $produk)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="room-item shadow rounded overflow-hidden">
                    <!-- Add your product details here -->
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ $produk->gambar_url }}" alt="{{ $produk->nama }}">
                        <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">Rp. {{ $produk->harga }}</small>
                    </div>
                    <div class="p-4 mt-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-0">{{ $produk->nama }}</h5>
                        </div>
                        <p class="text-body mb-3">{{ $produk->deskripsi }}</p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-sm btn-primary rounded py-2 px-4" href="{{ route('detailProduk', ['id' => $produk->id]) }}">View Detail</a>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('tambahKeKeranjang', ['id' => $produk->id]) }}">Order</a>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection