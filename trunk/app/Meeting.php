<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model implements \MaddHatter\LaravelFullcalendar\Event
{
    protected $dates = ['start_time', 'end_time'];

    protected $fillable = [
        'title', 'start_time', 'end_time', 'allday', 'private'
    ];

    public function getId() {
        return $this->id;
    }

    public function getTitle()
    {
        return "Meeting";
    }

    public function isAllDay()
    {
        return (bool)$this->allday;
    }

    public function getStart()
    {
        return $this->start_time;
    }

    public function getEnd()
    {
        return $this->end_time;
    }

    public function getEventOptions()
    {
        return [
            'color' => '#800',
            'url' => route('meetings.show', $this->getId()),
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
