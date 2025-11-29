<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'nip',
        'email',
        'photo',
        'phone',
        'subject',
    ];

    public function classes()
    {
        return $this->belongsToMany(SchoolClass::class, 'class_teacher', 'teacher_id', 'class_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    
}
