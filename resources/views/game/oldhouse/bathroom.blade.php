@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('_partials.sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Location:</b> The Bathroom</div>
                <div class="panel-body">
                    <p>A surprisingly clean bathroom, though dusty. </p>
                    <p>The room contains: a bath, toilet, sink and a small cupboard</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Actions</div>
                <div class="panel-body">
                    <action
                            message-data="Use the toilet"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="toilet"
                            modal-message="Ahhh! Thats better."
                    >
                    </action>
                    <action
                            message-data="Leave the bathroom"
                            :user-inventory="{{$user->inventoryList()}}"
                            url-data="{{route('oldhouse.corridor')}}"
                            modal-id="back"
                            modal-message="You go back into the corridor"
                    >
                    </action>
                    <action
                            message-data="Investigate the cupboard"
                            needed-item="small key"
                            pickup-data="front door key"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="cupboard"
                            modal-message="Its a bit of a sruggle but you manage to get the cupboard open. You find what looks like a front door key!"
                            >
                    </action>
                </div>

            </div>
        </div>
    </div>
@endsection