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
                'id_jenis_surat'    => 1, // Surat Keterangan Domisili
                'nomor_surat'       => null,
                'tanggal_pengajuan' => now()->toDateString(),
                'warga_id'          => 1,
                'status_admin'      => 'disetujui',
                'status_rw'         => 'disetujui',
                'status'            => 'selesai',
            ],

            // warga_id = 2
            [
                'nama_surat'        => 'Pengajuan Surat Keterangan Usaha',
                'id_jenis_surat'    => 4, // Surat Keterangan Usaha
                'nomor_surat'       => null,
                'tanggal_pengajuan' => now()->toDateString(),
                'warga_id'          => 2,
                'status_admin'      => 'menunggu',
                'status_rw'         => 'menunggu',
                'status'            => 'diproses',
            ],

            // warga_id = 3
            [
                'nama_surat'        => 'Pengajuan Surat Keterangan Tidak Mampu',
                'id_jenis_surat'    => 2, // SKTM
                'nomor_surat'       => null,
                'tanggal_pengajuan' => now()->toDateString(),
                'warga_id'          => 3,
                'status_admin'      => 'disetujui',
                'status_rw'         => 'menunggu',
                'status'            => 'diproses',
            ],
        ];

        foreach ($data as $item) {
            Surat::create($item);
        }
    }
}
