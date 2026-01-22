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

    public function rw()
{
    return $this->belongsTo(\App\Models\Rw::class, 'rw_id');
}

public function user()
{
    return $this->belongsTo(\App\Models\User::class, 'user_id');
}

    public function wargas()
    {
        return $this->hasMany(Warga::class, 'rt_id');
    }
}
