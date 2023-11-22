<?php

namespace Database\Factories;

use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PemesananPembayaran>
 */
class PemesananPembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'admin_id' => User::factory()->admin(),
            'pemesanan_id' => Pemesanan::factory(),
            'total' => function (array $attributes) {
                /** @var Pemesanan */
                $pemesanan = Pemesanan::find($attributes['pemesanan_id']);
                return $pemesanan->totalTagihan();
            }
        ];
    }
}
