<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $location
 * @property int $health
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Item[] $inventory
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereHealth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'location', 'health'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function inventory(){
        return $this->belongsToMany(Item::class, 'inventories')
            ->using(Inventory::class)
            ->withPivot('quantity');
    }

    public function inventoryCount(Item $item){
        return $this->inventory()->whereSlug($item->slug)->count();
    }

    public function inventoryList(){
        $addCount = $this->inventory->map(function($item, $key){
           $item->count = $this->inventoryCount($item);
           return $item;
        });
        return $addCount->unique('slug');
    }

    public function changeLocation($location){
        $this->location = $location;
        $this->save();
    }

    public function damage($damage){
        $this->health = ($damage > $this->health) ? 0 : $this->health - $damage;
        $this->save();
    }

    public function revive($revive){
        $this->health = (($this->health + $revive) > 100) ? 100 : $this->health + $revive;
        $this->save();
    }

    public function isDead(){
        return $this->health == 0;
    }

    public function reset(){
        $this->location = 'start';
        $this->health = 100;

        $this->save();
    }
}
