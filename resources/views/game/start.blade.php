@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('_partials.sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Location:</b> Small Bedroom</div>
                <div class="panel-body">
                    <p>You awake...</p>
                    <p>You are in a darkened room with a sliver of light filtering through a high window. The room has a door, a chest of drawers and
                        a filthy looking mattress on the floor.</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Actions</div>
                <div class="panel-body">
                    <action
                            message-data="Look in the chest of drawers"
                            pickup-data="apple"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="drawers"
                            modal-message="You route around in the drawers and find a fairly fresh apple!"
                    >
                    </action>
                    <action
                            message-data="Try the door"
                            url-data="{{route('oldhouse.corridor')}}"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="door"
                            modal-message="You try the door and it opens!"
                    >
                    </action>
                    <action
                            message-data="Try and have a look through the window"
                            take-damage="25"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="window"
                            modal-message="While trying to look through the high window, your foot slips through a hole in the floorboards!"
                    >
                    </action>
                    <action
                            message-data="Investigate the rank smelling mattress"
                            pickup-data="key"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="mattress"
                            modal-message="You find a key in the stinking covers!"
                    >
                    </action>
                </div>

            </div>
        </div>
    </div>
@endsection