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

            // USER ID 13 - septer@gmail.com
            [
                'q1' => 5,
                'q2' => 4,
                'q3' => 5,
                'kategori' => 'Sistem',
                'nilai' => 'Sangat Baik',
                'review' => 'Sistem sangat membantu dan mudah digunakan.',
                'tanggal' => Carbon::now()->subDays(5),
                'user_id' => 13,
            ],

            // USER ID 14 - elia@gmail.com
            [
                'q1' => 4,
                'q2' => 4,
                'q3' => 4,
                'kategori' => 'Pelayanan',
                'nilai' => 'Baik',
                'review' => 'Pelayanan cukup cepat dan sistem membantu.',
                'tanggal' => Carbon::now()->subDays(4),
                'user_id' => 14,
            ],

            // USER ID 15 - yosep@gmail.com
            [
                'q1' => 3,
                'q2' => 3,
                'q3' => 4,
                'kategori' => 'Petugas',
                'nilai' => 'Cukup',
                'review' => 'Masih perlu perbaikan di beberapa bagian.',
                'tanggal' => Carbon::now()->subDays(3),
                'user_id' => 15,
            ],

            // USER ID 16 - markus@gmail.com
            [
                'q1' => 5,
                'q2' => 5,
                'q3' => 5,
                'kategori' => 'Sistem',
                'nilai' => 'Sangat Baik',
                'review' => 'Sangat puas dengan sistem pelayanan ini.',
                'tanggal' => Carbon::now()->subDays(2),
                'user_id' => 16,
            ],

            // USER ID 17 - piska@gmail.com
            [
                'q1' => 4,
                'q2' => 5,
                'q3' => 4,
                'kategori' => 'Pelayanan',
                'nilai' => 'Baik',
                'review' => 'Sistem bagus, tampilan mudah dipahami.',
                'tanggal' => Carbon::now()->subDay(),
                'user_id' => 17,
            ],

        ];

        foreach ($data as $item) {
            Review::create($item);
        }
    }
}
