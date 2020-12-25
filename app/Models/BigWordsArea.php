<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BigWordsArea extends Model
{
    protected $fillable = ['user_id', 'description'];

    public function classroom()
    {

        return $this->belongsTo(Classroom::class);
    }
}
