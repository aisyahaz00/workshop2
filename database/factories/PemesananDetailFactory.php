<?php

namespace Database\Factories;

use App\Models\Pemesanan;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PemesananDetail>
 */
class PemesananDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pemesanan_id' => Pemesanan::factory(),
            'produk_id' => Produk::factory(),
            'nama_produk' => function (array $attributes) {
                $produk = Produk::find($attributes['produk_id']);

                return $produk->nama;
            },
            'qty' => random_int(1, 5),
            'harga_produk' => function (array $attributes) {
                $produk = Produk::find($attributes['produk_id']);

                return $produk->harga;
            },
        ];
    }
}
