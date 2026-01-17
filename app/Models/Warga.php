<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'rt_id',
        'rw_id',
        'pekerjaan',
        'status',
        'user_id'
    ];

    // Relasi ke RT
    public function rt()
    {
        return $this->belongsTo(Rt::class, 'rt_id');
    }

    // Relasi ke RW
    public function rw()
    {
        return $this->belongsTo(Rw::class, 'rw_id');
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
