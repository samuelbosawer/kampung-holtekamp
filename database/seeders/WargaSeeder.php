<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            // user_id = 15
            [
                'nik'            => '9171010101010001',
                'nama_lengkap'   => 'Yosep Yarangga',
                'jenis_kelamin'  => 'L',
                'tempat_lahir'   => 'Jayapura',
                'tanggal_lahir'  => '1995-05-12',
                'alamat'         => 'RT 001 RW 01 Kampung Holtekamp',
                'rt_id'          => 1,
                'rw_id'          => 1,
                'pekerjaan'      => 'Nelayan',
                'status'         => 'Menikah',
                'user_id'        => 15,
            ],

            // user_id = 16
            [
                'nik'            => '9171010101010002',
                'nama_lengkap'   => 'Markus Wanggai',
                'jenis_kelamin'  => 'L',
                'tempat_lahir'   => 'Sentani',
                'tanggal_lahir'  => '1998-08-20',
                'alamat'         => 'RT 002 RW 01 Kampung Holtekamp',
                'rt_id'          => 2,
                'rw_id'          => 1,
                'pekerjaan'      => 'Petani',
                'status'         => 'Belum Menikah',
                'user_id'        => 16,
            ],

            // user_id = 17
            [
                'nik'            => '9171010101010003',
                'nama_lengkap'   => 'Piska Rumkorem',
                'jenis_kelamin'  => 'P',
                'tempat_lahir'   => 'Jayapura',
                'tanggal_lahir'  => '2000-02-15',
                'alamat'         => 'RT 003 RW 02 Kampung Holtekamp',
                'rt_id'          => 3,
                'rw_id'          => 2,
                'pekerjaan'      => 'Mahasiswa',
                'status'         => 'Belum Menikah',
                'user_id'        => 17,
            ],
        ];

        foreach ($data as $item) {
            Warga::create($item);
        }
    }
}
