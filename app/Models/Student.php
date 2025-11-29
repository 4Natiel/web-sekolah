<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'nis',
        'class_id',
        'email',
        'photo',
        'phone'
    ];

    public function class()
{
    return $this->belongsTo(SchoolClass::class, 'classroom_id');
}

}
