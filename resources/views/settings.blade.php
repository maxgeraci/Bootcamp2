@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Settings</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('settingsPost') }}">
                            {{ csrf_field() }}
                            <label class="col-xs-12" style="float: left; font-size: 25px">Personal details</label>

                            <div class="form-group">
                                <label for="firstname" class="col-md-4 control-label">First name</label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $firstname }}" required>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lastname" class="col-md-4 control-label">Last name</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $lastname }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender" class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6" style="padding-top: 9px">
                                    <input id="gender" type="radio" name="gender" value="1" {{ $male }} required> Male<br>
                                    <input id="gender" type="radio" name="gender" value="2" {{ $female }}> Female
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="age" class="col-md-4 control-label">Age</label>

                                <div class="col-md-6">
                                    <input id="age" type="number" class="form-control" name="age" value="{{ $age }}" required>
                                </div>
                            </div>

                            <label class="col-xs-12" style="float: left; font-size: 25px">Gym</label>

                            <div class="form-group">
                                <label for="gym" class="col-md-4 control-label">Select your gym</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="gym">
                                        <?php
                                        $user_id = Auth::user()->id;
                                        $user = DB::select("select * from users where id='$user_id'");

                                        foreach ($gyms as $gym) {
                                            $id = $gym->id;
                                            $name = $gym->name;
                                            $city = $gym->city;
                                            $address = $gym->address;
                                            $gymid = $user[0]->gym;

                                            //echo '<option'. (($gymid == $id)?'selected="selected"':"") .'value=' . $id . '>' . $name . ' - ' . $city . ' - ' . $address . '</option>';
                                            echo '<option value="'.$id.'" '.(($gymid==$id)?'selected="selected"':"").'>'.$name.' - '.$city.' - '.$address.'</option>';
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>

                            <label class="col-xs-12" style="float: left; font-size: 25px">Workout details</label>

                            <div class="form-group">
                                <label for="days" class="col-md-4 control-label">On what days do you usually go to the gym?</label>

                                <div class="col-md-6" style="padding-top: 9px">
                                    <input id="days" type="checkbox" name="monday" value="1" {{ $monday }}> Monday<br>
                                    <input id="days" type="checkbox" name="tuesday" value="1" {{ $tuesday }}> Tuesday<br>
                                    <input id="days" type="checkbox" name="wednesday" value="1" {{ $wednesday }}> Wednesday<br>
                                    <input id="days" type="checkbox" name="thursday" value="1" {{ $thursday }}> Thursday<br>
                                    <input id="days" type="checkbox" name="friday" value="1" {{ $friday }}> Friday<br>
                                    <input id="days" type="checkbox" name="saturday" value="1" {{ $saturday }}> Saturday<br>
                                    <input id="days" type="checkbox" name="sunday" value="1" {{ $sunday }}> Sunday<br>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="benchpress" class="col-md-4 control-label">What is your benchpress PR in KG? (Leave empty if you don't benchpress)</label>

                                <div class="col-md-6" style="padding-top: 9px">
                                    <input id="benchpress" type="number" class="form-control" name="benchpress" value="{{ $benchpress }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="deadlift" class="col-md-4 control-label">What is your deadlift PR in KG? (Leave empty if you don't deadlift)</label>

                                <div class="col-md-6" style="padding-top: 9px">
                                    <input id="deadlift" type="number" class="form-control" name="deadlift" value="{{ $deadlift }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="squat" class="col-md-4 control-label">What is your squat PR in KG? (Leave empty if you don't squat)</label>

                                <div class="col-md-6" style="padding-top: 9px">
                                    <input id="squat" type="number" class="form-control" name="squat" value="{{ $squat }}">
                                </div>
                            </div>

                            <label class="col-xs-12" style="float: left; font-size: 25px">Preferences</label>

                            <div class="form-group">
                                <label for="genderpreference" class="col-md-4 control-label">I prefer to train with a</label>

                                <div class="col-md-6" style="padding-top: 9px">
                                    <input id="genderpreference" type="radio" name="genderpreference" value="1" {{ $malepreference }} required> Male<br>
                                    <input id="genderpreference" type="radio" name="genderpreference" value="2" {{ $femalepreference }}> Female<br>
                                    <input id="genderpreference" type="radio" name="genderpreference" value="3" {{ $nopreference }}> No preference
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
