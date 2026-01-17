<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Surat Keterangan Domisili',
                'keterangan' => 'Surat keterangan tempat tinggal warga',
            ],
            [
                'nama' => 'Surat Keterangan Tidak Mampu (SKTM)',
                'keterangan' => 'Digunakan untuk keperluan bantuan sosial dan pendidikan',
            ],
            [
                'nama' => 'Surat Pengantar',
                'keterangan' => 'Surat pengantar dari kampung ke instansi lain',
            ],
            [
                'nama' => 'Surat Keterangan Usaha',
                'keterangan' => 'Surat keterangan untuk usaha milik warga',
            ],
            [
                'nama' => 'Surat Keterangan Kelahiran',
                'keterangan' => 'Surat keterangan kelahiran dari kampung',
            ],
            [
                'nama' => 'Surat Keterangan Kematian',
                'keterangan' => 'Surat keterangan kematian warga',
            ],
            [
                'nama' => 'Surat Izin Keramaian',
                'keterangan' => 'Digunakan untuk izin acara atau kegiatan masyarakat',
            ],
            [
                'nama' => 'Surat Keterangan Pindah',
                'keterangan' => 'Surat keterangan pindah domisili warga',
            ],
            [
                'nama' => 'Surat Keterangan Belum Menikah',
                'keterangan' => 'Digunakan untuk keperluan administrasi pernikahan',
            ],
            [
                'nama' => 'Surat Keterangan Ahli Waris',
                'keterangan' => 'Surat keterangan ahli waris dari kampung',
            ],
        ];

        foreach ($data as $item) {
            JenisSurat::create($item);
        }
    }
}
