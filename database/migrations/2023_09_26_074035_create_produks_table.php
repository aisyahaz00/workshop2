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
        Schema::create('produks', function (Blueprint $table) {
            $table->id('id_produk')->increments();
            $table->string('nama_produk',100);
            $table->string('deskripsi_produk',600);
            $table->float('harga_produk');
            $table->string('gambar_produk',100);
            $table->string('merek_produk',30);
            $table->date('tanggal_rilis_produk');
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris');
            $table->unsignedBigInteger('id_pengguna');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('users');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
