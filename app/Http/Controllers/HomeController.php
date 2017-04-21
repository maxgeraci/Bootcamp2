<?php

namespace FindYourGymbuddy\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class HomeController extends Controller
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
        $user_id = Auth::user()->id;
        $gym = DB::select("SELECT * from users WHERE id='$user_id'");
        $gym_id = $gym[0]->gym;

        $users = DB::select("SELECT * FROM users WHERE id!='$user_id' AND gym='$gym_id'");

        foreach ($users as $user) {
            $first_user = DB::select("select * from users WHERE id='$user_id'");
            $second_user = DB::select("select * from users WHERE id='$user->id'");
            $first_user_id = $first_user[0]->id;
            $second_user_id = $second_user[0]->id;

            $percentage = 100;

            $age_difference = $first_user[0]->age - $second_user[0]->age;

            if ($age_difference <= 5 && $age_difference >= -5) {
                $percentage -= 0;
            } else if ($age_difference > 5 && $age_difference <= 15 || $age_difference < -5 && $age_difference >= -15) {
                $percentage -= 5;
            } else {
                $percentage -= 16;
            }

            if ($first_user[0]->monday == $second_user[0]->monday) {
                $percentage -= 0;
            } else {
                $percentage -= 3;
            }

            if ($first_user[0]->tuesday == $second_user[0]->tuesday) {
                $percentage -= 0;
            } else {
                $percentage -= 3;
            }

            if ($first_user[0]->wednesday == $second_user[0]->wednesday) {
                $percentage -= 0;
            } else {
                $percentage -= 3;
            }

            if ($first_user[0]->thursday == $second_user[0]->thursday) {
                $percentage -= 0;
            } else {
                $percentage -= 3;
            }

            if ($first_user[0]->friday == $second_user[0]->friday) {
                $percentage -= 0;
            } else {
                $percentage -= 3;
            }

            if ($first_user[0]->saturday == $second_user[0]->saturday) {
                $percentage -= 0;
            } else {
                $percentage -= 3;
            }

            if ($first_user[0]->sunday == $second_user[0]->sunday) {
                $percentage -= 0;
            } else {
                $percentage -= 3;
            }

            $benchpress_difference = $first_user[0]->benchpress - $second_user[0]->benchpress;

            if ($benchpress_difference <= 10 && $benchpress_difference >= -10) {
                $percentage -= 0;
            } else if ($benchpress_difference > 10 && $benchpress_difference <= 30 || $benchpress_difference < -10 && $benchpress_difference >= -30) {
                $percentage -= 5;
            } else {
                $percentage -= 11;
            }

            $deadlift_difference = $first_user[0]->deadlift - $second_user[0]->deadlift;

            if ($deadlift_difference <= 10 && $deadlift_difference >= -10) {
                $percentage -= 0;
            } else if ($deadlift_difference > 10 && $deadlift_difference <= 30 || $deadlift_difference < -10 && $deadlift_difference >= -30) {
                $percentage -= 5;
            } else {
                $percentage -= 11;
            }

            $squat_difference = $first_user[0]->squat - $second_user[0]->squat;

            if ($squat_difference <= 10 && $squat_difference >= -10) {
                $percentage -= 0;
            } else if ($squat_difference > 10 && $squat_difference <= 30 || $squat_difference < -10 && $squat_difference >= -30) {
                $percentage -= 5;
            } else {
                $percentage -= 11;
            }

            if ($first_user[0]->gender_preference == $second_user[0]->gender_preference || $first_user[0]->gender_preference == $second_user[0]->gender) {
                $percentage -= 0;
            } else {
                $percentage -=30;
            }

            $result = DB::select("SELECT * FROM matches WHERE first_user_id = '$first_user_id' AND second_user_id = '$second_user_id'");

            if (count($result) > 0) {
                DB::insert("UPDATE matches SET first_user_id='$first_user_id', second_user_id='$second_user_id', percentage='$percentage' WHERE first_user_id='$first_user_id' AND second_user_id='$second_user_id'");
            } else {
                DB::insert("INSERT INTO matches (first_user_id, second_user_id, percentage) VALUES ('$first_user_id', '$second_user_id', $percentage)");
            }
        }
        return view('home', ['users' => $users]);
    }
}
