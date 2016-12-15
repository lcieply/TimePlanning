<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\Meeting;

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
        $events = Event::where('user_id','=', Auth::id())->get();
        $meetings = Meeting::where('user_id','=', Auth::id())->orWhere('user2_id','=', Auth::id())->get();

        $calendar = \Calendar::addEvents($events)->addEvents($meetings);

        return view('home', compact('calendar'));
    }
}
