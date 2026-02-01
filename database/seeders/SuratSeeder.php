<?php

namespace Database\Seeders;

use App\Models\Surat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // warga_id = 1
            [
                'nama_surat'        => ' Keterangan Domisili',
                'jenis_surat_id'    => 1, // Surat Keterangan Domisili
                'tanggal_pengajuan' => now()->toDateString(),
                'warga_id'          => 1,
                // 'status_rw'      => '',
                // 'status_kepala'         => '',
                // 'status_rt'         => '',
            ],


              // warga_id = 1
            [
                'nama_surat'        => ' Keterangan Domisili',
                'jenis_surat_id'    => 1, // Surat Keterangan Domisili
                'tanggal_pengajuan' => now()->toDateString(),
                'warga_id'          => 2,
                'status_rw'      => 'Disetujui',
                'status_kepala'         => 'Disetujui',
                // 'status_rt'         => '',
            ],


            // warga_id = 2
            [
                'nama_surat'        => ' Keterangan Usaha',
                'jenis_surat_id'    => 4, // Surat Keterangan Usaha
                'tanggal_pengajuan' => now()->toDateString(),
                'warga_id'          => 2,
                // 'status_rw'      => '',
                'status_kepala'         => 'Disetujui',
                
            ],

            // warga_id = 3
            [
                'nama_surat'        => ' Keterangan Tidak Mampu',
                'jenis_surat_id'    => 2, // SKTM
                'tanggal_pengajuan' => now()->toDateString(),
                'warga_id'          => 3,
                
            ],
        ];

        foreach ($data as $item) {
            Surat::create($item);
        }
    }
}
