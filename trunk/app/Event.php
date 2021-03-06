<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model implements \MaddHatter\LaravelFullcalendar\Event
{
    protected $dates = ['start_time', 'end_time'];

    protected $fillable = [
        'title', 'description', 'start_time', 'end_time', 'allday', 'private'
    ];

    public static function rules() {
        return [
            'start' => 'before:end',
            'title' => 'required',
            'start_date' => 'date|required',
            'start_time' => 'required',
            'end_date' => 'date|required',
            'end_time' => 'required',
        ];
    }
    public static function rulesAllDay() {
        return [
            'title' => 'required',
            'start_date' => 'date|required',
        ];
    }
    public function getId() {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
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
            'url' => route('events.show', $this->getId()),
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
