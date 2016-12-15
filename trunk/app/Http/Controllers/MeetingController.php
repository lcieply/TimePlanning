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
        $start = str_replace('.', '-', $_POST['start_date'].' '. $_POST['start_time'].':00');
        $end = str_replace('.', '-', $_POST['end_date'].' '. $_POST['end_time'].':00');

        (User::find($_POST['user2_id'])) ?  $request->merge(array('secondUserExist' =>  1)) : $request->merge(array('secondUserExist' =>  0));
        $request->merge(array('start' =>  $start));
        $request->merge(array('end' =>  $end));

        $this->validate($request, Meeting::rules());

        $check = 0;
        if(isset($_POST['private'])) $check = 1;

        \DB::table('meetings')->insert([
            'user_id' => User::id(),
            'user2_id' => $_POST['user2_id'],
            'start_time' => $start,
            'end_time' => $end,
            'private' => $check
        ]);

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
