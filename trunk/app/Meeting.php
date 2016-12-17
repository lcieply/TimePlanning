<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model implements \MaddHatter\LaravelFullcalendar\Event
{
    protected $dates = ['start_time', 'end_time'];

    protected $fillable = [
        'title', 'start_time', 'end_time', 'allday', 'private'
    ];
    public static function rules() {
        return [
            'start' => 'before:end',
            'user2_id' => 'required',
            'start_date' => 'date|required',
            'start_time' => 'required',
            'end_date' => 'date|required',
            'end_time' => 'required',
        ];
    }
    public static function rulesAllDay() {
        return [
            'user2_id' => 'required',
            'start_date' => 'date|required',
        ];
    }
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return "Meeting " .
            User::find($this->user_id)->name .
            " ".
            User::find($this->user_id)->surname .
            " - " .
            User::find($this->user2_id)->name .
            " " .
            User::find($this->user2_id)->surname;
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
