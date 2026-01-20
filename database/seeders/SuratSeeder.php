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
                'nama_surat'        => 'Pengajuan Surat Keterangan Domisili',
                'jenis_surat_id'    => 1, // Surat Keterangan Domisili
                'nomor_surat'       => 1112,
                'tanggal_pengajuan' => now()->toDateString(),
                'warga_id'          => 1,
                'status_rw'      => 'Disetujui',
                'status_kepala'         => 'Disetujui',
            ],

            // warga_id = 2
            [
                'nama_surat'        => 'Pengajuan Surat Keterangan Usaha',
                'jenis_surat_id'    => 4, // Surat Keterangan Usaha
                'nomor_surat'       => 1113,
                'tanggal_pengajuan' => now()->toDateString(),
                'warga_id'          => 2,
                'status_rw'      => 'Menunggu',
                'status_kepala'         => 'Menunggu',
                
            ],

            // warga_id = 3
            [
                'nama_surat'        => 'Pengajuan Surat Keterangan Tidak Mampu',
                'jenis_surat_id'    => 2, // SKTM
                'nomor_surat'       => 11112,
                'tanggal_pengajuan' => now()->toDateString(),
                'warga_id'          => 3,
                'status_rw'      => 'Disetujui',
                'status_kepala'         => 'Menunggu',
                
            ],
        ];

        foreach ($data as $item) {
            Surat::create($item);
        }
    }
}
