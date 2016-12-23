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
            $end = $start;
        }else{
            $start = str_replace('.', '-', $_POST['start_date'].' '. $_POST['start_time'].':00');
            $end = str_replace('.', '-', $_POST['end_date'].' '. $_POST['end_time'].':00');
            $request->merge(array('start' =>  $start));
            $request->merge(array('end' =>  $end));
            $request->merge(array('allday' =>  0));
            $this->validate($request, Event::rules());


        }
        $this->insertIntoDB($request->title, $request->description, $start, $end, $request->private, $request->allday);
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
        if(isset($_POST['allday']) and $_POST['allday'] == 1) {
            $start = str_replace('.', '-', $_POST['start_date'].' 00:00:00');
            $request->merge(array('start' =>  $start));
            $this->validate($request, Event::rulesAllDay());
            $end = $start;

        }else{
            $start = str_replace('.', '-', $_POST['start_date'].' '. $_POST['start_time'].':00');
            $end = str_replace('.', '-', $_POST['end_date'].' '. $_POST['end_time'].':00');
            $request->merge(array('start' =>  $start));
            $request->merge(array('end' =>  $end));
            $this->validate($request, Event::rules());


        }

        $this->updateInDB($event, $request->title, $request->description, $start, $end, $request->private, $request->allday);


        return redirect()->route('events.show', $event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function updateInDB($event,$title, $description, $start, $end, $private, $allday){
        $event->update([
            'title' => $title,
            'description' => $description,
            'start_time' => $start,
            'end_time' => $end,
            'private' => $private,
            'allday' => $allday
        ]);
    }

    private function insertIntoDB($title, $description, $start, $end, $private, $allday )
    {
        \DB::table('events')->insert([
            'user_id' => User::id(),
            'title' => $title,
            'description' => $description,
            'start_time' => $start,
            'end_time' => $end,
            'private' => $private,
            'allday' => $allday
        ]);
    }
    public function destroy(Event $event)
    {
        $event->delete();


        return redirect()->route('users.search');
    }
}