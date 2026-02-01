<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = false;

  protected $fillable = [
        'user_id','tanggal',
        'q1','q2','q3','q4','q5','q6',
        'q7','q8','q9','q10','q11','q12',
    ];


    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
