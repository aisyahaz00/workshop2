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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('id_review')->increments();
            $table->string('nama_review',50);
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
        Schema::dropIfExists('reviews');
    }
};
