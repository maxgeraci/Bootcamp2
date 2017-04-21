@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($isIdSet == true)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User</div>
                    <div class="panel-body">
                        <div class="col-sm-6" style="margin-top: 3%">
                            <img src="https://d1ty0e8cxefhfl.cloudfront.net/images/profiles/profile-unknown-male.png" width="100%" style="margin: 0 auto; display: block"/>
                        </div>
                        <div class="col-sm-6" style="margin-top: 3%;">
                            <div class="name" style="font-size: 1.8em; line-height: 24px;"><b>Personal details</b></div>
                            <div class="name" style="font-size: 1.3em; line-height: 20px;">{{ $user[0]->first_name }} {{ $user[0]->last_name }}</div>
                            <div class="name" style="font-size: 1.3em; line-height: 20px;">@if ($user[0]->gender == 1) Male @elseif ($user[0]->gender == 2) female @else @endif</div>
                            <div class="name" style="font-size: 1.3em; line-height: 20px;">@if (isset($user[0]->age)){{ $user[0]->age }} years old @else @endif</div>
                            <div class="name" style="font-size: 1.3em; line-height: 20px;">@if (isset($gym[0]->name)){{ $gym[0]->name }} - {{ $gym[0]->city }} - {{ $gym[0]->address }} @else @endif</div><br>

                            <div class="name" style="font-size: 1.8em; line-height: 24px;"><b>Gym schedule</b></div>
                            <div class="name" style="font-size: 1.3em; line-height: 20px;">@if ($user[0]->monday == 0)  @elseif ($user[0]->monday == 1) Monday @else @endif @if ($user[0]->tuesday == 0)  @elseif ($user[0]->tuesday == 1) Tuesday @else @endif @if ($user[0]->wednesday == 0)  @elseif ($user[0]->wednesday == 1) Wednesday @else @endif @if ($user[0]->thursday == 0)  @elseif ($user[0]->thursday == 1) Thursday @else @endif @if ($user[0]->friday == 0)  @elseif ($user[0]->friday == 1) Friday @else @endif @if ($user[0]->saturday == 0)  @elseif ($user[0]->saturday == 1) Saturday @else @endif @if ($user[0]->sunday == 0)  @elseif ($user[0]->sunday == 1) Sunday @else @endif</div><br>

                            <div class="name" style="font-size: 1.8em; line-height: 24px;"><b>Personal records</b></div>
                            <div class="name" style="font-size: 1.3em; line-height: 20px;">Benchpress: {{ $user[0]->benchpress }}kg</div>
                            <div class="name" style="font-size: 1.3em; line-height: 20px;">Deadlift: {{ $user[0]->deadlift }}kg</div>
                            <div class="name" style="font-size: 1.3em; line-height: 20px;">Squat: {{ $user[0]->squat }}kg</div>
                        </div>
                        <div class="col-xs-12" style="text-align: center; margin-top: 10%;">
                            <a href="mailto:{{ $user[0]->email }}" style="background-color: lightblue; color: whitesmoke; font-weight: 700; padding: 10px 15px; border-radius: 5px; font-size: 2em;">Contact {{ $user[0]->first_name }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
