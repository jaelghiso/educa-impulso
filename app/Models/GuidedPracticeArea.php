<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuidedPracticeArea extends Model
{
    protected $fillable = ['user_id', 'title', 'guidedPracticeText', 'urlVideoGuided', 'image'];

    public function classroom()
    {

        return $this->belongsTo(Classroom::class);
    }
}
