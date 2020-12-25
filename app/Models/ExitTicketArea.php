<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExitTicketArea extends Model
{
    protected $fillable = ['user_id', 'description', 'urlExitTicket'];

    public function classroom()
    {

        return $this->belongsTo(Classroom::class);
    }
}
