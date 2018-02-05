@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4 class="text-center">CONGRATULATIONS!</h4></div>
                <div class="panel-body text-center">
                    <p>
                        You have got as far as me!
                    </p>
                    <p>
                        Come back soon and see if I have added any more.
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