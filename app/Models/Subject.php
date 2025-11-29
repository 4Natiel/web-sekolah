<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'code', 'description'];

    // Relasi: satu subject bisa punya banyak schedule
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

}
