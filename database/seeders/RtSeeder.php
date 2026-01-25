<?php

namespace Database\Seeders;

use App\Models\Rt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            // ===== RW 01 (id = 1) =====
            [
                'nama_rt'    => 'RT 01',
                'kepala_rt'  => 'Harzah',
                'keterangan' => 'RT 01 RW 01',
                'rw_id'      => 1,
                'user_id'    => 22,
            ],
            [
                'nama_rt'    => 'RT 02',
                'kepala_rt'  => 'Gerika Mansi',
                'keterangan' => 'RT 02 RW 01',
                'rw_id'      => 1,
                'user_id'    => 23,
            ],
            [
                'nama_rt'    => 'RT 03',
                'kepala_rt'  => 'Ferry Samallo',
                'keterangan' => 'RT 03 RW 01',
                'rw_id'      => 1,
                'user_id'    => 24,
            ],
            [
                'nama_rt'    => 'RT 04',
                'kepala_rt'  => 'Thomas Samallo',
                'keterangan' => 'RT 04 RW 01',
                'rw_id'      => 1,
                'user_id'    => 25,
            ],

            // ===== RW 02 (id = 2) =====
            [
                'nama_rt'    => 'RT 01',
                'kepala_rt'  => 'Haba',
                'keterangan' => 'RT 01 RW 02',
                'rw_id'      => 2,
                'user_id'    => 26,
            ],
            [
                'nama_rt'    => 'RT 02',
                'kepala_rt'  => 'Mujis',
                'keterangan' => 'RT 02 RW 02',
                'rw_id'      => 2,
                'user_id'    => 27,
            ],

            // ===== RW 03 (id = 3) =====
            [
                'nama_rt'    => 'RT 01',
                'kepala_rt'  => 'Paula Korombani',
                'keterangan' => 'RT 01 RW 03',
                'rw_id'      => 3,
                'user_id'    => 28,
            ],
            [
                'nama_rt'    => 'RT 02',
                'kepala_rt'  => 'Amil N. Ansanay',
                'keterangan' => 'RT 02 RW 03',
                'rw_id'      => 3,
                'user_id'    => 29,
            ],
            [
                'nama_rt'    => 'RT 03',
                'kepala_rt'  => 'Melianus Satya',
                'keterangan' => 'RT 03 RW 03',
                'rw_id'      => 3,
                'user_id'    => 30,
            ],
        ];

        foreach ($data as $item) {
            Rt::create($item);
        }
    }
}
