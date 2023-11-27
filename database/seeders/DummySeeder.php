<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * List untuk buat data dummy.
     *
     * @var array<string>
     */
    public static $seeder = [
        UserSeeder::class,
        ProdukSeeder::class,
        PemesananSeeder::class,
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(self::$seeder);
    }
}
