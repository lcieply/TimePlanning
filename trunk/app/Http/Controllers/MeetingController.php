<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Meeting;
use App\User;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if(!User::find($id)) abort(404);
        return view('meetings.create')->with('id', $id);
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
            $this->validate($request, Meeting::rulesAllDay());

            \DB::table('meetings')->insert([
                'user_id' => User::id(),
                'user2_id' => $_POST['user2_id'],
                'start_time' => $start,
                'end_time' => $start,
                'private' => $_POST['private'],
                'allday' => 1
            ]);
        }else{
            $start = str_replace('.', '-', $_POST['start_date'].' '. $_POST['start_time'].':00');
            $request->merge(array('start' =>  $start));
            $end = str_replace('.', '-', $_POST['end_date'].' '. $_POST['end_time'].':00');
            $request->merge(array('end' =>  $end));
            $this->validate($request, Meeting::rules());

            \DB::table('meetings')->insert([
                'user_id' => User::id(),
                'user2_id' => $_POST['user2_id'],
                'start_time' => $start,
                'end_time' => $end,
                'private' => $_POST['private'],
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
    public function show(Meeting $meeting)
    {
        return view('meetings.show')->withMeeting($meeting)->withUser(Auth::id());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        return view('meetings.edit')->withMeeting($meeting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();

        return redirect()->route('home.index');
    }
}
