<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\MaestrosSeeder;
use Database\Seeders\SeguimientoSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (app()->isLocal()) {
            $this->call([
                MaestrosSeeder::class,
                SeguimientoSeeder::class,
            ]);
        }
    }
}
