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
                'kepala_rw'  => 'Antonius Sunarto',
                'keterangan' => 'Wilayah RW 01',
                'user_id'    => 19,
            ],
            [
                'nama_rw'    => 'RW 02',
                'kepala_rw'  => 'Jamaluddin',
                'keterangan' => 'Wilayah RW 02',
                'user_id'    => 20,
            ],
            [
                'nama_rw'    => 'RW 03',
                'kepala_rw'  => 'Godlief Fatipeme',
                'keterangan' => 'Wilayah RW 03',
                'user_id'    => 21,
            ],
        ];

        foreach ($data as $item) {
            RwModel::create($item);
        }
    }
}
