<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RwSeeder::class);
        $this->call(RtSeeder::class);
        $this->call(WargaSeeder::class);
        $this->call(PengumumanSeeder::class);
        $this->call(JenisSuratSeeder::class);
        $this->call(SuratSeeder::class);
    }
}
