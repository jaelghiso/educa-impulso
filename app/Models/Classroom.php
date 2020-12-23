<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //
    protected $fillable = [
        'user_id',
        'course_id',
        'wwbat_areas_id',
        'big_words_areas_id',
        'schedule_areas_id',
        'do_now_areas_id',
        'guided_practice_areas_id',
        'individual_practice_areas_id',
        'exit_ticket_areas_id',
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
