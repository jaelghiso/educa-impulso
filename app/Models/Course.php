<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['user_id', 'title', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function summary()
    {
        return $this->hasOne(Summary::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
