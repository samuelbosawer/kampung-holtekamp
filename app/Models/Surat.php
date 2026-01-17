<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
     protected $table = 'surats';

    public $timestamps = false;

    protected $fillable = [
        'nama_surat',
        'id_jenis_surat',
        'nomor_surat',
        'tanggal_pengajuan',
        'warga_id',
        'status_admin',
        'status_rw',
        'status',
    ];

    // Relasi ke Jenis Surat
    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'id_jenis_surat');
    }

    // Relasi ke Warga
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }
}
