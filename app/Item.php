<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Item
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $life
 * @property string $type
 * @property int $single_use
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereLife($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereSingleUse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'name', 'slug', 'life', 'single_use', 'type'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'inventories')
            ->using(Inventory::class)
            ->withPivot('quantity', 'id');
    }


}
