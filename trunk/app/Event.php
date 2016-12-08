<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model implements \MaddHatter\LaravelFullcalendar\Event
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $dates = ['start_time', 'end_time'];

    public function getId() {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function isAllDay()
    {
        //TO-DO
        return true;
    }

    public function getStart()
    {
        return $this->start_time;
    }

    public function getEnd()
    {
        return $this->end_time;
    }
}
