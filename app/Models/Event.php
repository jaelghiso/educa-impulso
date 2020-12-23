<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'event-date',
        'event-time',
        'title',
        'description',
        'priority',
        'tags',
        'topics'
    ];

    protected $casts = [
        'event-date' => 'date:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {

        return $this->belongsTo(Course::class);
    }
}
