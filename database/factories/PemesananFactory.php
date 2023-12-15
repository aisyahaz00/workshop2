<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemesanan>
 */
class PemesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'alamat' => function (array $attributes) {
                $user = User::find($attributes['user_id']);

                return $user->alamat;
            },
            'invoice_number' => fake()->bothify('??##-##-??###'),
            'status_pemesanan' => 'baru',
        ];
    }
}
