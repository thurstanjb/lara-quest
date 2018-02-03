<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
