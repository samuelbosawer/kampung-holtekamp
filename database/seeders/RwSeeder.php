<?php

namespace Database\Seeders;

use App\Models\Rw as RwModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            [
                'nama_rw'    => 'RW 01',
                'kepala_rw'  => 'Andi Saputra',
                'keterangan' => 'Wilayah RW 01',
                'user_id'    => 3,
            ],
            [
                'nama_rw'    => 'RW 02',
                'kepala_rw'  => 'Budi Santoso',
                'keterangan' => 'Wilayah RW 02',
                'user_id'    => 4,
            ],
            [
                'nama_rw'    => 'RW 03',
                'kepala_rw'  => 'Maria Yuliana',
                'keterangan' => 'Wilayah RW 03',
                'user_id'    => 5,
            ],
        ];

        foreach ($data as $item) {
            RwModel::create($item);
        }
    }
}
