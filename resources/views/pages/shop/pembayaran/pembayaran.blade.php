@extends('layouts.shop.halaman-layout')
@section('konten')
<div class="container">
    <h1 class="my-4">Pembayaran Pesanan</h1>
    <div class="row">
        <div class="col-md-6">
            <h2>Detail Pesanan</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Produk 1</td>
                        <td>Rp. 100,000</td>
                        <td>2</td>
                        <td>Rp. 200,000</td>
                    </tr>
                    <!-- Tambahkan baris pesanan lainnya di sini -->
                </tbody>
            </table>
            <h3>Total Pembayaran: Rp. 200,000</h3>
        </div>
        <div class="col-md-6">
            <h2>Informasi Pembayaran</h2>
            <form>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap Anda">
                </div>
                <div class="mb-3">
                    <label for="nomor-kartu" class="form-label">Nomor Kartu Kredit</label>
                    <input type="text" class="form-control" id="nomor-kartu" placeholder="Masukkan Nomor Kartu Kredit Anda">
                </div>
                <div class="mb-3">
                    <label for="tanggal-exp" class="form-label">Tanggal Kadaluarsa</label>
                    <input type="text" class="form-control" id="tanggal-exp" placeholder="MM/YY">
                </div>
                <div class="mb-3">
                    <label for="cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" id="cvv" placeholder="Masukkan CVV">
                </div>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
        </div>
    </div>
</div>
@endsection