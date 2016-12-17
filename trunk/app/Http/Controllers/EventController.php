<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($_POST['allday'])){
            $start = str_replace('.', '-', $_POST['start_date'].' 00:00:00');
            $request->merge(array('start' =>  $start));
            $this->validate($request, Event::rulesAllDay());

            \DB::table('events')->insert([
                'user_id' => User::id(),
                'title' => $request->title,
                'description' => $request->description,
                'start_time' => $start,
                'end_time' => $start,
                'private' => $request->private,
                'allday' => 1
            ]);
        }else{
            $start = str_replace('.', '-', $_POST['start_date'].' '. $_POST['start_time'].':00');
            $end = str_replace('.', '-', $_POST['end_date'].' '. $_POST['end_time'].':00');
            $request->merge(array('start' =>  $start));
            $request->merge(array('end' =>  $end));
            $this->validate($request, Event::rules());

            \DB::table('events')->insert([
                'user_id' => User::id(),
                'title' => $request->title,
                'description' => $request->description,
                'start_time' => $start,
                'end_time' => $end,
                'private' => $request->private,
                'allday' => 0
            ]);
        }
        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.show')->withEvent($event)->withUser(Auth::id());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit')->withEvent($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        if(isset($_POST['allday'])) {
            $start = str_replace('.', '-', $_POST['start_date'].' 00:00:00');
            $request->merge(array('start' =>  $start));
            $this->validate($request, Event::rulesAllDay());
            $event->update([
                'title' => $request->title,
                'description' => $request->description,
                'start_time' => $start,
                'end_time' => $start,
                'private' => $request->private,
                'allday' => $request->allday
            ]);

        }else{
            $start = str_replace('.', '-', $_POST['start_date'].' '. $_POST['start_time'].':00');
            $end = str_replace('.', '-', $_POST['end_date'].' '. $_POST['end_time'].':00');
            $request->merge(array('start' =>  $start));
            $request->merge(array('end' =>  $end));
            $this->validate($request, Event::rules());

            $event->update([
                'title' => $request->title,
                'description' => $request->description,
                'start_time' => $start,
                'end_time' => $end,
                'private' => $request->private,
                'allday' => $request->allday
            ]);
        }


        return redirect()->route('events.show', $event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();


        return redirect()->route('users.search');
    }
}