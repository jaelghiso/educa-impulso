<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualPracticeArea extends Model
{
    protected $fillable = ['user_id', 'title', 'individualPracticeText', 'highlightList', 'image'];

    public function classroom()
    {

        return $this->belongsTo(Classroom::class);
    }
}
