<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Meeting;
use App\User;
use Illuminate\Support\Facades\DB;

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
        if (!User::find($id)) abort(404);
        return view('meetings.create')->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->allday) {
            $start = str_replace('.', '-', $_POST['start_date'] . ' 00:00:00');
            $end = str_replace('.', '-', $_POST['start_date'] . ' 23:59:59');
            $this->validate($request, Meeting::rulesAllDay());
        } else {
            $start = str_replace('.', '-', $_POST['start_date'] . ' ' . $_POST['start_time'] . ':00');
            $end = str_replace('.', '-', $_POST['end_date'] . ' ' . $_POST['end_time'] . ':00');
            $this->validate($request, Meeting::rules());
        }

        $request->merge([['start' => $start], ['end' => $end]]);

        $isFirstUserBusy =  $this->isBusy(Auth::id(), $start, $end);
        $isSecondUserBusy = $this->isBusy($request->user2_id, $start, $end);
        if ($isFirstUserBusy || $isSecondUserBusy) {
            if ($isFirstUserBusy)
                $errors[] = "You already have another meeting at this time!";

            if ($isSecondUserBusy) {
                $secondUser = User::find($request->user2_id);
                $errors[] = $secondUser->name . " " . $secondUser->surname . " already have another meeting at this time!";
            }

            return redirect()->route('meetings.create', $request->user2_id)->withErrors($errors);
        }

        $this->insertIntoDB($request->user2_id, $start, $end, $request->private, $request->allday);

        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        return view('meetings.show')->withMeeting($meeting)->withUser(Auth::id());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        return view('meetings.edit')->withMeeting($meeting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        $request->user2_id = $_POST['user2_id'];
        if(isset($_POST['allday'])) {
            $start = str_replace('.', '-', $_POST['start_date'].' 00:00:00');
            $request->merge(array('start' =>  $start));
            $this->validate($request, Meeting::rulesAllDay());
            $meeting->update([
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
            $this->validate($request, Meeting::rules());

            $meeting->update([
                'start_time' => $start,
                'end_time' => $end,
                'private' => $request->private,
                'allday' => $request->allday
            ]);
        }


        return redirect()->route('meetings.show', $meeting);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();

        return redirect()->route('home.index');
    }

    public function search(Request $request, $id)
    {
        return redirect()->route('meetings.create', $id);
    }

    private function isBusy($id, $start, $end)
    {
        /*
         * +        $results = DB::select('select count(*) from meetings where
+                  (user_id = \'' . $id . '\' OR user2_id = \'' . $id . '\')
+                  AND ( \'' . $start . '\' BETWEEN start_time AND end_time
+                  OR \'' . $end . '\' BETWEEN start_time AND end_time);');
+
+        return $results == 0 ? false : true;
         */
        $resultsMeetings = DB::table('meetings')
            ->select('*')
            ->where('user_id', '=', $id)
            ->whereBetween('start_time', [$start, $end])
            ->orWhereBetween('end_time', [$start, $end])
             ->where('user_id', '=', $id)
            ->get()
            ->count();
        $resultsEvents = DB::table('events')
            ->select('*')
            ->where('user_id', '=', $id)
            ->whereBetween('start_time', [$start, $end])
            ->orWhereBetween('end_time', [$start, $end])
            ->where('user_id', '=', $id)
            ->get()
            ->count();

        return $resultsEvents + $resultsMeetings;
    }

    private function insertIntoDB($user2_id, $start, $end, $private, $allday)
    {
        \DB::table('meetings')->insert([
            'user_id' => User::id(),
            'user2_id' => $user2_id,
            'start_time' => $start,
            'end_time' => $end,
            'private' => $private,
            'allday' => $allday
        ]);
    }
}
