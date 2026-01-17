<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'judul',
        'isi_pengumuman',
        'tanggal',
        'cover',
        'user_id'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
