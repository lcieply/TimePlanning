<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Calendar start from 1970
        $event = \Calendar::event(
            "Epoch time",
            true,
            '1970-01-01',
            '1970-01-01',
            1
        );

        $calendar = \Calendar::addEvent($event);

        return view('home', compact('calendar'));
    }
}
