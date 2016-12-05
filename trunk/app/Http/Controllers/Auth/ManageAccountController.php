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
use Illuminate\Support\Facades\Auth;


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


}