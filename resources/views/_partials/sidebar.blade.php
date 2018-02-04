<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">Health</div>
        <div class="panel-body">
            <health-bar :user-health="{{$user->health}}"></health-bar>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Inventory</div>
        <div class="panel-body">
            <inventory :user-inventory="{{$user->inventoryList()}}"></inventory>
        </div>
    </div>
</div>