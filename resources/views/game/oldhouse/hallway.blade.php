@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('_partials.sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Location:</b> The Hallway</div>
                <div class="panel-body">
                    <p>The hallway is dark and narrow. It smells slightly musty</p>
                    <p>You can see stairs going up, the front door, a door to your left and a door behind you</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Actions</div>
                <div class="panel-body">
                    <action
                            message-data="Go up the stairs"
                            :user-inventory="{{$user->inventoryList()}}"
                            url-data="{{route('oldhouse.corridor')}}"
                            modal-id="stairs"
                            modal-message="You climb up the creaking stairs"
                    >
                    </action>
                    <action
                            message-data="Exit via the front door"
                            needed-item="front door key"
                            :user-inventory="{{$user->inventoryList()}}"
                            url-data="{{route('oldhouse.garden')}}"
                            modal-id="door"
                            modal-message="You use the front door key to open the door"
                    >
                    </action>
                    <action
                            message-data="Open the door behind you"
                            needed-item="kitchen key"
                            url-data="{{route('oldhouse.kitchen')}}"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="kitchen"
                            modal-message="You open the door with the kitchen key"
                    >
                    </action>
                    <action
                            message-data="Try the door to your left"
                            pickup-data="kitchen key"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="cubbyhole"
                            modal-message="You open the door, it turns out to be a small cupbourd under the stairs. You notice the kitchen key hanging on a
                            hook."
                    >
                    </action>
                </div>

            </div>
        </div>
    </div>
@endsection