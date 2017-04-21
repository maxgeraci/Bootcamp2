@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <table class="table">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Match percentage</th>
                        <th>More info</th>
                    </tr>
                    <?php
                    $user_id = Auth::user()->id;
                    foreach ($users as $user) {
                            $percentage = DB::select("select * from matches where first_user_id='$user_id' AND second_user_id='$user->id'");
                            echo '<tr>
                                <td><img src="https://d1ty0e8cxefhfl.cloudfront.net/images/profiles/profile-unknown-male.png" style="width: 50px"/></td>
                                <td>'. $user->first_name .'</td>
                                <td>'. $percentage[0]->percentage .'%</td>
                                <td><a href="/user?id='. $user->id .'">Read More</a></td>
                            </tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
