<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

        $info = "The meeting was scheduled for " . $start . " to " . $end;

        return view('meetings.create')->withId($request->user2_id)->withInfo($info);
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
        if(isset($_POST['allday']) and $_POST['allday'] == 1) {
            $start = str_replace('.', '-', $_POST['start_date'].' 00:00:00');
            $request->merge(array('start' =>  $start));
            $end = $start;
            $this->validate($request, Meeting::rulesAllDay());

        }else{
            $start = str_replace('.', '-', $_POST['start_date'].' '. $_POST['start_time'].':00');
            $end = str_replace('.', '-', $_POST['end_date'].' '. $_POST['end_time'].':00');
            $request->merge(array('start' =>  $start));
            $request->merge(array('end' =>  $end));
            $this->validate($request, Meeting::rules());
        }
        $this->updateInDB($meeting, $start, $end, $request->private, $request->allday);

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
        $this->validate($request, Meeting::rulesSearch());

        $result = $this->doThisShit($id, $request->date, $request->time, $request->time2, $request->duration);

        if($result == null) {
            return view('meetings.create')->with('id', $id)
                ->withErrors("It's not possible to set a meeting with the specified parameters");
        }

        $this->insertIntoDB($id, $result[0], $result[1], $request->private2, false);

        $info = "The meeting was scheduled for " . $result[0] . " (Duration: " . $request->duration . ")";

        return view('meetings.create')->withId($id)->withInfo($info);
    }

    private function isBusy($id, $start, $end)
    {
        //Correct select:
        //SELECT * FROM meetings WHERE (user_id=$id or user2_id=$id)
        // AND (
        //((start_time>=$start AND start_time<=$end) OR (end_time>=$start AND end_time<=$end))
        // OR (($start>=start_time AND $start<=end_time) OR ($end>=start_time AND $end<=end_time))
        //)

        return Meeting::where(function ($query) use ($id) {
            $query->where('user_id', $id)->orWhere('user2_id', $id);
        })->where(function ($query) use ($start, $end) {
            $query->where(function ($query) use ($start, $end) {
                $query->where(
                    [['start_time', '>', $start], ['start_time', '<', $end]]
                )->orWhere(
                    [['end_time', '>', $start], ['end_time', '<', $end]]
                );
            }
            )->orWhere(function ($query) use ($start, $end) {
                $query->where(
                    [['start_time', '<', $start], ['end_time', '>', $start]]
                )->orWhere(
                    [['start_time', '<', $end], ['end_time', '>', $end]]
                );
            });
        }
        )->exists();
    }

    private function updateInDB($meeting, $start, $end, $private, $allday){
        $meeting->update([
            'start_time' => $start,
            'end_time' => $end,
            'private' => $private,
            'allday' => $allday
        ]);
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

    private function getMeetingEndTime($id, $start, $end)
    {
        return Meeting::where(function ($query) use ($id) {
                $query->where('user_id', $id)->orWhere('user2_id', $id);
            })->where(function ($query) use ($start, $end) {
            $query->where(function ($query) use ($start, $end) {
                    $query->where(
                        [['start_time', '>', $start], ['start_time', '<', $end]]
                    )->orWhere(
                        [['end_time', '>', $start], ['end_time', '<', $end]]
                    );
                }
            )->orWhere(function ($query) use ($start, $end) {
                    $query->where(
                        [['start_time', '<', $start], ['end_time', '>', $start]]
                    )->orWhere(
                        [['start_time', '<', $end], ['end_time', '>', $end]]
                        );
                });
            }
        )->orderBy('end_time','DESC')->value('end_time');
    }

    private function doThisShit($id, $date, $startTime, $endTime, $duration)
    {
        $durationHAndM = explode(":", $duration);
        $lowerLimitTime = Carbon::createFromFormat('Y-m-d H:i', $date . " " . $startTime);
        $upperLimitTime = Carbon::createFromFormat('Y-m-d H:i', $date . " " . $endTime);

        $start = $lowerLimitTime->copy();
        $end = $lowerLimitTime->copy()->addHours($durationHAndM[0])->addMinutes($durationHAndM[1]);

        $found = false;
        while($upperLimitTime->gte($end)) {
            if($this->isBusy($id, $start, $end)) {
                $meetingEndTime = $this->getMeetingEndTime($id, $start, $end);

                $start = Carbon::createFromFormat('Y-m-d H:i:s', $meetingEndTime);
                $end = $start->copy()->addHours($durationHAndM[0])->addMinutes($durationHAndM[1]);

                continue;
            }

            if($this->isBusy(Auth::id(), $start, $end)) {
                $meetingEndTime = $this->getMeetingEndTime(Auth::id(), $start, $end);

                $start = Carbon::createFromFormat('Y-m-d H:i:s', $meetingEndTime);
                $end = $start->copy()->addHours($durationHAndM[0])->addMinutes($durationHAndM[1]);

                continue;
            }

            $found=true;
            break;
        }

       return $found ? [$start, $end] : null;
    }
}
