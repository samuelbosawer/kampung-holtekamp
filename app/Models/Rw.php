<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'nama_rw',
        'kepala_rw',
        'keterangan',
        'user_id'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rts()
    {
        return $this->hasMany(Rt::class, 'rw_id');
    }

    public function wargas()
    {
        return $this->hasMany(Warga::class, 'rw_id');
    }

}
