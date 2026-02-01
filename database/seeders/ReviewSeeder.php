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
        $userIds = [13, 14, 15, 16, 17];

        foreach ($userIds as $userId) {
            Review::create([
                'q1'  => rand(3, 5),
                'q2'  => rand(3, 5),
                'q3'  => rand(3, 5),
                'q4'  => rand(3, 5),
                'q5'  => rand(3, 5),
                'q6'  => rand(3, 5),
                'q7'  => rand(3, 5),
                'q8'  => rand(3, 5),
                'q9'  => rand(3, 5),
                'q10' => rand(3, 5),
                'q11' => rand(3, 5),
                'q12' => rand(3, 5),
                'tanggal' => Carbon::now()->subDays(rand(1, 10)),
                'user_id' => $userId,
            ]);
        }
    }
}
