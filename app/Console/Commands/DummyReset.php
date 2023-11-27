<?php

namespace App\Console\Commands;

use Database\Seeders\DummySeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DummyReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dummy-reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrasi ulang dan isi database dengan fake data.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate:fresh');
        $this->line('berhasil migrasi ulang');
        $this->line('');

        DB::transaction(function () {
            $this->line('mulai isi data');
            $this->callDummy(DummySeeder::$seeder);
        });
    }

    /**
     * Panggil untuk buat data dummy.
     */
    private function callDummy(array $seeders)
    {
        $countSeeders = count($seeders);

        foreach ($seeders as $key => $value) {
            $padCount = strlen((string) $countSeeders);
            $index = str_pad($key + 1, $padCount, '0', STR_PAD_LEFT);
            $this->line("($index/$countSeeders) Seeding $value");
            Artisan::call('db:seed', ['--class' => $value]);
        }
    }
}
