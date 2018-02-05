@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('_partials.sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Location:</b> The Garden</div>
                <div class="panel-body">
                    <p>Somebody needs to cut the grass! Though your glad to be outside. It is starting to rain and the wind is blowing</p>
                    <p>The old house looks very run down, but has a sturdy front door. You can see a path to the front gate.</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Actions</div>
                <div class="panel-body">
                    {{--<action--}}
                            {{--message-data="Have a look in the cooker"--}}
                            {{--:user-inventory="{{$user->inventoryList()}}"--}}
                            {{--modal-id="cooker"--}}
                            {{--modal-message="You find a mouldy pie, you leave it there"--}}
                    {{-->--}}
                    {{--</action>--}}
                    {{--<action--}}
                            {{--message-data="Use the door"--}}
                            {{--needed-item="kitchen key"--}}
                            {{--:user-inventory="{{$user->inventoryList()}}"--}}
                            {{--url-data="{{route('oldhouse.hallway')}}"--}}
                            {{--modal-id="door"--}}
                            {{--modal-message="You use the kitchen key to open the door"--}}
                    {{-->--}}
                    {{--</action>--}}
                    {{--<action--}}
                            {{--message-data="Whats in the fridge"--}}
                            {{--pickup-data="chocolate bar"--}}
                            {{--url-data="{{route('oldhouse.kitchen')}}"--}}
                            {{--:user-inventory="{{$user->inventoryList()}}"--}}
                            {{--modal-id="boxes"--}}
                            {{--modal-message="As you walk across the rug on the floor, it gives way and you fall through!"--}}
                    {{-->--}}
                    {{--</action>--}}
                    {{--<action--}}
                            {{--message-data="Leave the room"--}}
                            {{--url-data="{{route('oldhouse.corridor')}}"--}}
                            {{--:user-inventory="{{$user->inventoryList()}}"--}}
                            {{--modal-id="leave"--}}
                            {{--modal-message="You open the door and go back into the corridor"--}}
                    {{-->--}}
                    {{--</action>--}}
                </div>

            </div>
        </div>
    </div>
@endsection