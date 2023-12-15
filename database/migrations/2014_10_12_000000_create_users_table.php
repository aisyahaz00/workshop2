<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengguna', 50);
            $table->text('alamat');
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->string('no_hp_pengguna', 20)->nullable();
            $table->string('no_rek_pengguna', 50);
            $table->string('role', 20);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
