<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 04.12.16
 * Time: 21:18
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ManageAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user = Auth::user();
        return view('auth/manageAccount')->withUser($user);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'city' => 'max:255',
            'address' => 'max:255',
            'phone' => 'max:9',
        ]);

        $name = $request['name'];
        $surname = $request['surname'];
        $city = $request['city'];
        $address = $request['address'];
        $phone = $request['phone'];
        DB::table('users')
            ->where('email', Auth::user()->email)
            ->update([
                'name' => $name,
                'surname' => $surname,
                'city' => $city,
                'address' => $address,
                'phone' => $phone,
            ]);

        return redirect()->back();
    }


}