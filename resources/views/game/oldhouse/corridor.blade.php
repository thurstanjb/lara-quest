@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('_partials.sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Location:</b> The Corridor</div>
                <div class="panel-body">
                    <p>The door leads to a corridor on the second floor of an old house. You can hear and intermittent thudding coming from above your head.</p>
                    <p>There are 3 doors, one behind you, one to your left and one to the right. Stairs can be seen at the far end and lead down.</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Actions</div>
                <div class="panel-body">
                    <action
                            message-data="Check out the left door"
                            url-data="{{route('oldhouse.bathroom')}}"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="left_door"
                            modal-message="The door is a bit stiff, but it lets you in."
                    >
                    </action>
                    <action
                            message-data="Try the door to the right"
                            needed-item="key"
                            url-data="{{route('oldhouse.bedroom')}}"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="right_door"
                            modal-message="You use your key and the room opens."
                    >
                    </action>
                    <action
                            message-data="Try the door behind you"
                            url-data="{{route('oldhouse.small_bedroom')}}"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="behind_door"
                            modal-message="The door opens."
                    >
                    </action>
                    <action
                            message-data="Go down the stairs"
                            url-data="{{route('oldhouse.hallway')}}"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="stairs"
                            modal-message="You descend down the creaking stairs"
                    >
                    </action>
                </div>

            </div>
        </div>
    </div>
@endsection