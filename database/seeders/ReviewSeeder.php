<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'review' => 'Pelayanan sangat baik dan cepat.',
                'tanggal' => Carbon::now()->subDays(5),
                'user_id' => 13,
            ],
            [
                'review' => 'Petugas ramah dan membantu.',
                'tanggal' => Carbon::now()->subDays(4),
                'user_id' => 14,
            ],
            [
                'review' => 'Sistem pelayanan desa sangat membantu warga.',
                'tanggal' => Carbon::now()->subDays(3),
                'user_id' => 15,
            ],
            [
                'review' => 'Pengajuan surat diproses dengan cepat.',
                'tanggal' => Carbon::now()->subDays(2),
                'user_id' => 16,
            ],
            [
                'review' => 'Aplikasi mudah digunakan dan informatif.',
                'tanggal' => Carbon::now()->subDays(1),
                'user_id' => 17,
            ],
        ];

        foreach ($data as $item) {
            Review::create($item);
        }
    }
}
