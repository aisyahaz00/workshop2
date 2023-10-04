@extends('layouts.shop.halaman-layout')
@section('konten')
<div class="container mt-5">
    <h1 class="mb-4">Pesanan</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Barang A</td>
                <td>Rp 100.000</td>
                <td>2</td>
                <td>Rp 200.000</td>
            </tr>
            <tr>
                <td>Barang B</td>
                <td>Rp 75.000</td>
                <td>3</td>
                <td>Rp 225.000</td>
            </tr>
            <!-- Tambahkan baris-baris lainnya di sini -->
        </tbody>
    </table>

    <div class="text-end">
        <h4>Total Pesanan: Rp 425.000</h4>
        <button class="btn btn-primary">Proses Pesanan</button>
    </div>
</div>
@endsection

