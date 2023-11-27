@extends('layouts.shop.halaman-layout')
@section('konten')
<div class="container mt-5">
    <h1 class="mb-4">Pesanan</h1>
    <div class="card">
        <div class="card-body d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
            <div class="order-md-2 text-center">
                <div>
                    <h5 class="card-title text-start">Album NCT DREAM</h5>
                    <img src="https://www.ktown4u.com/goods_files/SH0164/goods_images/000056/GD00055738.default.2.jpg" class="card-img-top" alt="gambar hotsa" style="width: 18rem">
                </div>
            </div>  

            <div class="order-md-2">
                <div class="ml-md-4">
                    <p class="card-text mb-2 mt-0">NCT DREAM - Album Vol.1 [맛 (Hot Sauce)] (Jewel Case Ver.) (Random Ver.)</p>
                    <br>
                    <p class="card-text mb-3 text-end">x1</p>
                    <p class="card-text mb-3 text-end">Rp. 160.000</p>
                </div>
            </div> 
        </div> 
        
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="justify-content-start">3 Produk</span>
            <span class="justify-content-end">Total Pesanan: Rp. 160.000</span>
        </div>        

        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="justify-content-start">Produk akan sedang diproses dan akan melakukan pengiriman pada 05 Oktober 2023</span>
            <a href="{{route('pembayaran')}}" class="btn btn-primary ml-auto">Pesanan Diterima</a>
        </div>                               
    </div>
</div>
@endsection