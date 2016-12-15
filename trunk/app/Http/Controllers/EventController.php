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
        $start = str_replace('.', '-', $_POST['start_date'].' '. $_POST['start_time'].':00');
        $end = str_replace('.', '-', $_POST['end_date'].' '. $_POST['end_time'].':00');
        $request->merge(array('start' =>  $start));
        $request->merge(array('end' =>  $end));
        $this->validate($request, Event::rules());

        \DB::table('events')->insert([
            'user_id' => User::id(),
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'start_time' => $start,
            'end_time' => $end
        ]);

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
        ]);

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

        return redirect()->route('home.index');
    }
}