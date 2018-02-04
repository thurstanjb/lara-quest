@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('_partials.sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Location:</b> Unknown</div>
                <div class="panel-body">
                    <p>You awake...</p>
                    <p>You are in a darkened room with a sliver of light filtering through a high window. The room has a door, a chest of drawers and
                        a filthy looking mattress on the floor.</p>
                </div>
            </div>
        </div>
    </div>
@endsection