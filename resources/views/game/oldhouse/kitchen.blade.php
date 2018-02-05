@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('_partials.sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Location:</b> The Kitchen</div>
                <div class="panel-body">
                    <p>Your in a large spacious kitchen, though it looks like nobody has done the washing up for some time</p>
                    <p>In the kitchen there is a large range cooker, a fridge, a dresser, several cupboards and a large bay window.</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Actions</div>
                <div class="panel-body">
                    <action
                            message-data="Have a look in the cooker"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="cooker"
                            modal-message="You find a mouldy pie, you leave it there"
                    >
                    </action>
                    <action
                            message-data="Use the door"
                            needed-item="kitchen key"
                            :user-inventory="{{$user->inventoryList()}}"
                            url-data="{{route('oldhouse.hallway')}}"
                            modal-id="door"
                            modal-message="You use the kitchen key to open the door"
                    >
                    </action>
                    <action
                            message-data="Whats in the fridge I wonder?"
                            pickup-data="chocolate bar"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="fridge"
                            modal-message="You find a chocolate bar!"
                    >
                    </action>
                    <action
                            message-data="Have a good route through the cupboards"
                            pickup-data="crisps"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="cupboards"
                            modal-message="You find a packet of crisps"
                    >
                    </action>
                    <action
                            message-data="Check out the window"
                            needed-item="rusty hammer"
                            take-damage="30"
                            url-data="{{route('oldhouse.garden')}}"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="window"
                            modal-message="You smash the window with the hammer and climb out, not without cutting yourself."
                    >
                    </action>
                    <action
                            message-data="Open the dresser"
                            pickup-data="rusty hammer"
                            :user-inventory="{{$user->inventoryList()}}"
                            modal-id="dresser"
                            modal-message="Hmm, this hammer might come in useful"
                    >
                    </action>

                </div>

            </div>
        </div>
    </div>
@endsection