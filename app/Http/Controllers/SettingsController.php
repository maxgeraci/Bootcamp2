<?php

namespace FindYourGymbuddy\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class SettingsController extends Controller
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

        $user = DB::select("select * from users where id='$user_id'");
        $gyms = DB::select("select * from gyms");

        if ($user[0]->first_name != null) {
            $firstname = $user[0]->first_name;
        } else {
            $firstname = '';
        }
        if ($user[0]->last_name != null) {
            $lastname = $user[0]->last_name;
        } else {
            $lastname = '';
        }
        if ($user[0]->gender != null) {
            if ($user[0]->gender == 1) {
                $male = "checked";
                $female = "";
            } else if ($user[0]->gender == 2){
                $female = "checked";
                $male = "";
            } else {
                $male = "";
                $female = "";
            }
        } else {
            $male = "";
            $female = "";
        }
        if ($user[0]->age != null) {
            $age = $user[0]->age;
        } else {
            $age = '';
        }
        if ($user[0]->monday != null) {
            if ($user[0]->monday = 1) {
                $monday = 'checked';
            } else {
                $monday = "";
            }
        } else {
            $monday = '';
        }
        if ($user[0]->tuesday != null) {
            if ($user[0]->tuesday = 1) {
                $tuesday = 'checked';
            } else {
                $tuesday = "";
            }
        } else {
            $tuesday = '';
        }
        if ($user[0]->wednesday != null) {
            if ($user[0]->wednesday = 1) {
                $wednesday = 'checked';
            } else {
                $wednesday = "";
            }
        } else {
            $wednesday = '';
        }
        if ($user[0]->thursday != null) {
            if ($user[0]->thursday = 1) {
                $thursday = 'checked';
            } else {
                $thursday = "";
            }
        } else {
            $thursday = '';
        }
        if ($user[0]->friday != null) {
            if ($user[0]->friday = 1) {
                $friday = 'checked';
            } else {
                $friday = "";
            }
        } else {
            $friday = '';
        }
        if ($user[0]->saturday != null) {
            if ($user[0]->saturday = 1) {
                $saturday = 'checked';
            } else {
                $saturday = "";
            }
        } else {
            $saturday = '';
        }
        if ($user[0]->sunday != null) {
            if ($user[0]->sunday = 1) {
                $sunday = 'checked';
            } else {
                $sunday = "";
            }
        } else {
            $sunday = '';
        }
        if ($user[0]->benchpress != 0) {
            $benchpress = $user[0]->benchpress;
        } else {
            $benchpress = '';
        }
        if ($user[0]->deadlift != 0) {
            $deadlift = $user[0]->deadlift;
        } else {
            $deadlift = '';
        }
        if ($user[0]->squat != 0) {
            $squat = $user[0]->squat;
        } else {
            $squat = '';
        }
        if ($user[0]->gender_preference != null) {
            if ($user[0]->gender_preference == 1) {
                $malepreference = "checked";
                $femalepreference = "";
                $nopreference = "";
            } else if ($user[0]->gender_preference == 2) {
                $malepreference = "";
                $femalepreference = "checked";
                $nopreference = "";
            } else if ($user[0]->gender_preference == 3) {
                $malepreference = "";
                $femalepreference = "";
                $nopreference = "checked";
            } else {
                $malepreference = "";
                $femalepreference = "";
                $nopreference = "";
            }
        } else {
            $malepreference = "";
            $femalepreference = "";
            $nopreference = "";
        }

        return view('settings', ['firstname' => $firstname, 'lastname' => $lastname, 'male' => $male,
            'female' => $female, 'age' => $age, 'gyms' => $gyms, 'monday' => $monday, 'tuesday' => $tuesday, 'wednesday' => $wednesday,
            'thursday' => $thursday, 'friday' => $friday, 'saturday' => $saturday, 'sunday' => $sunday,
            'benchpress' => $benchpress, 'deadlift' => $deadlift, 'squat' => $squat, 'malepreference' => $malepreference,
            'femalepreference' => $femalepreference, 'nopreference' => $nopreference]);
    }

    public function settingsPost() {
        $user_id = Auth::user()->id;

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $gender = $_POST["gender"];
        $age = $_POST["age"];
        if (isset($_POST['gym'])) {
            $gym = $_POST['gym'];
        } else {
            $gym = 0;
        }
        if (isset($_POST['monday'])) {
            $monday = $_POST['monday'];
        } else {
            $monday = 0;
        }
        if (isset($_POST['tuesday'])) {
            $tuesday = $_POST['tuesday'];
        } else {
            $tuesday = 0;
        }
        if (isset($_POST['wednesday'])) {
            $wednesday = $_POST['wednesday'];
        } else {
            $wednesday = 0;
        }
        if (isset($_POST['thursday'])) {
            $thursday = $_POST['thursday'];
        } else {
            $thursday = 0;
        }
        if (isset($_POST['friday'])) {
            $friday = $_POST['friday'];
        } else {
            $friday = 0;
        }
        if (isset($_POST['saturday'])) {
            $saturday = $_POST['saturday'];
        } else {
            $saturday = 0;
        }
        if (isset($_POST['sunday'])) {
            $sunday = $_POST['sunday'];
        } else {
            $sunday = 0;
        }

        $benchpress = $_POST["benchpress"];
        $deadlift = $_POST["deadlift"];
        $squat = $_POST["squat"];
        $genderpreference = $_POST["genderpreference"];

        DB::insert("UPDATE users SET first_name='$firstname', last_name='$lastname', gender='$gender', age='$age',
        gym='$gym', monday='$monday', tuesday='$tuesday', wednesday='$wednesday', thursday='$thursday', friday='$friday',
        saturday='$saturday', sunday='$sunday', benchpress='$benchpress', deadlift='$deadlift', squat='$squat',
        gender_preference='$genderpreference' WHERE id='$user_id'");

        return redirect('home');
    }
}
