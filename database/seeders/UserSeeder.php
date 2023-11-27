<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buat admin
        User::factory()->admin()->create([
            'nama_pengguna' => 'admin',
            'email' => 'admin@example.test',
        ]);

        // buat pembeli
        User::factory()->count(50)->create();

        $user = User::where('role', 'pembeli')->first();
        $user->email = 'pembeli@example.test';
        $user->save();
    }
}
