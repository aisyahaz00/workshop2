<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id('id_pemesanan')->increments();
            $table->float('jumlah_produk_pemesanan');
            $table->date('tanggal_pemesanan');
            $table->boolean('sub_total_pemesanan');
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris');
            $table->unsignedBigInteger('id_pengguna');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('users');
            $table->unsignedBigInteger('id_pembayaran');
            $table->foreign('id_pembayaran')->references('id_pembayaran')->on('pembayarans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
