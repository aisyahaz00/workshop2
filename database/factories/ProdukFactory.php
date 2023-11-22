<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['baju', 'celana', 'jam']) . ' ' . random_int(1, 9999),
            'deskripsi' => fake()->paragraph(),
            'harga' => fake()->randomElement([1_000, 2_000, 5_000]) * random_int(1, 13),
        ];
    }
}
