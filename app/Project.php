<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    protected $dates = ['started_at', 'finished_at'];

    public function getFormattedStartAttribute()
    {
        return $this->started_at->format('F j, Y');
    }

    public function getFormattedFinishAttribute()
    {
        return $this->finished_at->format('F j, Y');
    }
}
