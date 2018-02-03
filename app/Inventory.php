<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Inventory extends Pivot
{
    protected $table = 'inventories';

    protected $fillable = [
        'user_id', 'item_id', 'quantity'
    ];
}
