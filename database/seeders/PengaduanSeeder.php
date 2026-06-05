<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Siti Aminah',
                'email' => 'siti.aminah@example.com',
                'nomor_hp' => '081234567890',
                'pesan' => 'Saya ingin melaporkan jalan yang rusak di RT 03. Mohon segera diperbaiki agar tidak membahayakan warga.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'nomor_hp' => '082345678901',
                'pesan' => 'Sampah menumpuk di depan gang 5 dan belum diangkut selama tiga hari.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rina Utami',
                'email' => 'rina.utami@example.com',
                'nomor_hp' => '083456789012',
                'pesan' => 'Lampu penerangan jalan di sebelah masjid mati sejak kemarin malam.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('pengaduans')->insert($data);
    }
}
