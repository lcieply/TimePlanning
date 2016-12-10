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

    public static function rules() {
        return [
            'start' => 'before:end',
            'name' => 'required',
            'title' => 'required',
            'start_date' => 'date|required',
            'start_time' => 'required',
            'end_date' => 'date|required',
            'end_time' => 'required',
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
