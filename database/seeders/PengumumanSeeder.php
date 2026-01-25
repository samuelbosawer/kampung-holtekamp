<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // user_id = 1 (admin)
            [
                'judul'          => 'Rapat Umum',
                'isi_pengumuman' => 'Kepada kepala RW dan RT harap bisa berkumpul di Kantor Kampung',
                'tanggal'        => now()->toDateString(),
                'cover'          => null,
                'user_id'        => 1,
            ],

            // user_id = 2 (kepala)
            [
                'judul'          => 'Lomba gawang mini',
                'isi_pengumuman' => 'Harap untuk setia peserta lomaba mengumpulkan formulir pendaftaran',
                'tanggal'        => now()->toDateString(),
                'cover'          => null,
                'user_id'        => 1,
            ],
        ];

        foreach ($data as $item) {
            Pengumuman::create($item);
        }
    }
}
