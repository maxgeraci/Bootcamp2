<?php

namespace FindYourGymbuddy\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['id'])) {
            $isIdSet = true;
            $id = $_GET['id'];
            $user = DB::select("select * from users WHERE id='$id'");
            $gymId = $user[0]->gym;
            $gym = DB::select("select * from gyms WHERE id='$gymId'");
        } else {
            $isIdSet = false;
            $user = "";
        }

        return view('user', ['user' => $user, 'isIdSet' => $isIdSet, 'gym' => $gym]);
    }
}
