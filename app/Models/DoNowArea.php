<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoNowArea extends Model
{
    protected $fillable = ['user_id', 'description', 'urlDoNow'];
}
