@extends('layouts.shop.halaman-layout')
@section('konten')
    <div class="container mt-5">
        <h1 class="mb-4">Keranjang Belanja</h1>
        <div class="card">
            <div class="card-body d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                <div class="order-md-2 text-center">
                    <div class="form-check mb-3 mb-md-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <h5 class="card-title">Album NCT DREAM</h5>
                        </label>
                    </div>
                    <div>
                        <img src="https://www.ktown4u.com/goods_files/SH0164/goods_images/000056/GD00055738.default.2.jpg" class="card-img-top" alt="gambar hotsa" style="width: 18rem">
                    </div>
                </div>  

                <div class="order-md-2">
                    <div class="ml-md-4">
                        <p class="card-text mb-2 mt-0">NCT DREAM - Album Vol.1 [맛 (Hot Sauce)] (Jewel Case Ver.) (Random Ver.)</p>
                        <p class="card-text mb-3">Rp. 160.000</p>
                    </div>
                    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                    <div class="center">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div>
                        <p></p>
                    </div>
                    <div class="ml-md-auto  d-flex justify-content-end">
                        <a href="#" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg></a>
                    </div>
                </div> 
            </div> 
            
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="justify-content-start">Total Pesanan: Rp. 160.000</span>
                <a href="{{route('pembayaran')}}" class="btn btn-primary ml-auto">Check Out</a>
            </div>                       
        </div>
    </div>
@endsection