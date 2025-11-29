<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extracurriculars extends Model
{
     protected $fillable = [
        'nama',
        'pembina_id',
        'deskripsi',
        'jadwal'
    ];

    public function pembina()
    {
        return $this->belongsTo(Teacher::class, 'pembina_id');
    }
}
