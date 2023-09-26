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
        Schema::create('detail_kategoris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemesanan');
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanans');
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kategoris');
    }
};
