@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4 class="text-center">Well Your Dead!</h4></div>
                <div class="panel-body text-center">
                    <p>
                        So how did you manage that? Your family will never know what happened to you.
                    </p>
                    <p>
                        just a bit selfish that!
                    </p>
                    <p>
                        &nbsp;
                    </p>
                    <p>
                        <a href="{{route('reset')}}" class="btn btn-primary btn-lg">Start Again!</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection