@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('_partials.sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Location:</b> The Bedroom</div>
                <div class="panel-body">
                    <p>The room is a haze of fat blue bottle flies, as you walk into the room you see a decomposing body on the floor.</p>
                    <p>You spot a wardrobe across the room and boxes in the corner.</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Actions</div>
                <div class="panel-body">
                    {{--<action--}}
                            {{--message-data="Check out the left door"--}}
                            {{--url-data="{{route('oldhouse.bedroom')}}"--}}
                            {{--:user-inventory="{{$user->inventoryList()}}"--}}
                            {{--modal-id="left_door"--}}
                            {{--modal-message="The door is a bt stiff, but it lets you in"--}}
                    {{-->--}}
                    {{--</action>--}}
                </div>

            </div>
        </div>
    </div>
@endsection