<?php

namespace Database\Seeders;

use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use App\Models\PemesananPembayaran;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Seeder;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semuaProduk = Produk::get();
        $semuaPembeli = User::where('role', 'pembeli')->get();
        $admin = User::where('role', 'admin')->first();

        for ($i = 0; $i < 100; $i++) {
            $pembeli = $semuaPembeli->random();

            $pemesanan = Pemesanan::factory()->for($pembeli, 'owner')->create();
            $jumlahProduk = random_int(1, 3);
            PemesananDetail::factory()
                ->count($jumlahProduk)
                ->sequence(
                    ...$semuaProduk
                        ->random($jumlahProduk)
                        ->map(fn (Produk $produk) => ['produk_id' => $produk->id])
                )
                ->for($pemesanan, 'pemesanan')
                ->create();

            if (fake()->boolean(65)) {
                PemesananPembayaran::factory()
                    ->for($admin, 'admin')
                    ->for($pemesanan, 'pemesanan')
                    ->create();
            }
        }
    }
}
