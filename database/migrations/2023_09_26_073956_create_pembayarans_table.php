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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran')->increments();
            $table->float('total_pembayaran');
            $table->date('tanggal_pembayaran');
            $table->boolean('status_pembayaran');
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
        Schema::dropIfExists('pembayarans');
    }
};
