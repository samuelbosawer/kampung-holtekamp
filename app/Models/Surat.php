<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
     protected $table = 'surats';

    public $timestamps = false;

    protected $fillable = [
        'nama_surat',
        'jenis_surat_id',
        'tanggal_pengajuan',
        'warga_id',
        'status_rw',
        'status_rt',
        'status_kepala',
        'keterangan',
    ];

    // Relasi ke Jenis Surat
    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }

    // Relasi ke Warga
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }
}
