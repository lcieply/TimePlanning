<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 04.12.16
 * Time: 21:18
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;

class ManageAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth/manageAccount');
    }
}