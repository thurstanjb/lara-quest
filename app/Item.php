<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'name', 'slug', 'life', 'single_use', 'type'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function users(){
        return $this->belongsToMany(User::class, 'inventories')
            ->using(Inventory::class)
            ->withPivot('quantity');
    }


}
