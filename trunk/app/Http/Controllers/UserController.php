<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Meeting;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if($user->id == Auth::id()) {
            $statement = [['user_id','=', $user->id]];
            $orStatement = [['user2_id','=', $user->id]];
        }
        else {
            $statement = [['user_id','=', $user->id],['private','=',false]];
            $orStatement = [['user2_id','=', $user->id],['private','=',false]];
        }

        $events = Event::where($statement)->get();
        $meetings = Meeting::where($statement)->orWhere($orStatement)->get();

        $calendar = \Calendar::addEvents($events)->addEvents($meetings);

        return view('users.show', compact('calendar'))->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if($user->id != Auth::id())
            abort(404);

        return view('users.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|max:255|alpha',
            'surname' => 'required|max:255|alpha',
            'city' => 'max:255|alpha',
            'address' => 'max:255',
            'phone' => 'digits_between:1,9',
        ]);

        $name = $request->name;
        $surname = $request->surname;
        $city = $request->city;
        $address = $request->address;
        $phone = $request->phone;
        DB::table('users')
            ->where('id', $user->id())
            ->update([
                'name' => $name,
                'surname' => $surname,
                'city' => $city,
                'address' => $address,
                'phone' => $phone,
            ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {

        $search_term = $_POST['search'];
        $searched = explode(" ", $search_term); //array with words - name, surname, name+surname
        $in=count($searched); //quantity of words in search phrase
        $users=NULL;
        if($search_term == "")
        {
            return view('users.search')->withUsers($users);
        }
       else if($in==1)
       {
            $word = $searched[0];
            $users=DB::select("SELECT * FROM users WHERE (`name` = \"$word\"  OR `surname` = \"$word\" )");
            return view('users.search')->withUsers($users);


       }
       else if($in==2)
       {
           $name = $searched[0];
           $surname = $searched[1];
           $users = DB::select("SELECT * FROM users WHERE ((`name` = \"$name\"  AND `surname` = \"$surname\") OR (`name` = \"$surname\"  AND `surname` = \"$name\"))");
           if(empty($users))
           {
               $users = DB::select("SELECT * FROM users WHERE ((`name` = \"$name\"  OR `surname` = \"$name\") OR (`name` = \"$surname\"  OR `surname` = \"$surname\"))");
           }
           return view('users.search')->withUsers($users);
       }

    }


}
