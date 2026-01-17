<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nama_rt',
        'kepala_rt',
        'keterangan',
        'rw_id',
        'user_id'
    ];

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

    public function wargas()
    {
        return $this->hasMany(Warga::class, 'rt_id');
    }
}
