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
            // user_id = 6
            [
                'nama_rt'    => 'RT 001',
                'kepala_rt'  => 'Ahmad Yusuf',
                'keterangan' => 'RT 001 RW 01',
                'rw_id'      => 1,
                'user_id'    => 6,
            ],

            // user_id = 7
            [
                'nama_rt'    => 'RT 002',
                'kepala_rt'  => 'Rudi Hartono',
                'keterangan' => 'RT 002 RW 01',
                'rw_id'      => 1,
                'user_id'    => 7,
            ],

            // user_id = 8
            [
                'nama_rt'    => 'RT 003',
                'kepala_rt'  => 'Siti Aminah',
                'keterangan' => 'RT 003 RW 02',
                'rw_id'      => 2,
                'user_id'    => 8,
            ],

            // user_id = 9
            [
                'nama_rt'    => 'RT 004',
                'kepala_rt'  => 'Dedi Saputra',
                'keterangan' => 'RT 004 RW 02',
                'rw_id'      => 2,
                'user_id'    => 9,
            ],

            // user_id = 10
            [
                'nama_rt'    => 'RT 005',
                'kepala_rt'  => 'Maria Lestari',
                'keterangan' => 'RT 005 RW 03',
                'rw_id'      => 3,
                'user_id'    => 10,
            ],

            // user_id = 11
            [
                'nama_rt'    => 'RT 006',
                'kepala_rt'  => 'Yohanis Wenda',
                'keterangan' => 'RT 006 RW 03',
                'rw_id'      => 3,
                'user_id'    => 11,
            ],

            // user_id = 12
            [
                'nama_rt'    => 'RT 007',
                'kepala_rt'  => 'Agus Salim',
                'keterangan' => 'RT 007 RW 03',
                'rw_id'      => 3,
                'user_id'    => 12,
            ],
        ];

        foreach ($data as $item) {
            Rt::create($item);
        }
    }
}
