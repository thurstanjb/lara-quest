@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4 class="text-center">Start your LaraQuest Adventure Today!</h4></div>
                <div class="panel-body text-center">
                    <p>
                        A long, long time ago in a hyperspace far, far away... or something like that!!
                    </p>
                    <p>
                        Explore a mythical world, solve puzzles and defend yourself against a yet to be decided hostile environment.
                        Sign up today for game saving abilities!
                    </p>
                    <p>
                        &nbsp;
                    </p>
                    <p>
                        <a href="{{route('register')}}" class="btn btn-primary btn-lg">Start Your Adventure!</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection
