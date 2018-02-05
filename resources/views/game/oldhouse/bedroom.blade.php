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
                    <action
                            message-data="Whats in the wardrobe"
                            take-damage="95"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="wardrobe"
                            modal-message="AGGHHGGHHH! You get attacked by a mutant rat! You sustain severe damage before you can kick it back into the
                            wardrobe and slam the door shut."
                    >
                    </action>
                    <action
                            message-data="Examine the corpse"
                            pickup-data="small key"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="corpse"
                            modal-message="After gagging on the putrid stench, you discover a small key in a trouser pocket."
                    >
                    </action>
                    <action
                            message-data="Look in the boxes"
                            take-damage="80"
                            url-data="{{route('oldhouse.kitchen')}}"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="boxes"
                            modal-message="As you walk across the rug on the floor, it gives way and you fall through!"
                    >
                    </action>
                    <action
                            message-data="Leave the room"
                            url-data="{{route('oldhouse.corridor')}}"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="leave"
                            modal-message="You open the door and go back into the corridor"
                    >
                    </action>
                </div>

            </div>
        </div>
    </div>
@endsection