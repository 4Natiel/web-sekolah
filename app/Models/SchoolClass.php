<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'name',
        'code',
    ];

    // Relasi many-to-many ke Teacher
    public function teachers()
    {
        return $this->belongsToMany(\App\Models\Teacher::class, 'class_teacher', 'class_id', 'teacher_id');
    }

    public function students()
{
    return $this->hasMany(Student::class, 'classroom_id');
}

}
