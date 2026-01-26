<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = false;

  protected $fillable = [
        'q1','q2','q3','q4','q5',
        'kategori','nilai',
        'review','tanggal','user_id'
    ];


    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
