<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //
    protected $fillable = [
        'user_id',
        'course_id',
        'title',
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

    public function bigWords()
    {
        return $this->hasOne(BigWordsArea::class);
    }

    public function wwbatArea()
    {
        return $this->hasOne(WwbatArea::class);
    }

    public function scheduleArea()
    {
        return $this->hasOne(ScheduleArea::class);
    }

    public function doNow()
    {
        return $this->hasOne(DoNowArea::class);
    }

    public function guidedPractice()
    {
        return $this->hasOne(GuidedPracticeArea::class);
    }

    public function individualPractice()
    {
        return $this->hasOne(IndividualPracticeArea::class);
    }

    public function exitTicket()
    {
        return $this->hasOne(ExitTicketArea::class);
    }
}
