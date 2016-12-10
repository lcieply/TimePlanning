<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;

class NewEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('newEvent');
    }
    public function store(Request $request)
    {
        $start = str_replace('.', '-', $_POST['start_date'].' '. $_POST['start_time'].':00');
        $end = str_replace('.', '-', $_POST['end_date'].' '. $_POST['end_time'].':00');
        $request->merge(array('start' =>  $start));
        $request->merge(array('end' =>  $end));
        $this->validate($request, Event::rules());
        \DB::table('events')->insert(
            array(
                    'name' => $_POST['name'],
                    'user_id' => User::id(),
                    'title' => $_POST['title'],
                    'start_time' => $start,
                    'end_time' => $end
                 )
        );
        return redirect()->route('home.index');
    }

}
