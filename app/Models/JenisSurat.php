<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'keterangan',
    ];
}
