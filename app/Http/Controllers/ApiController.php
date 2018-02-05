<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function eat(Request $request){
        $user = $request->user();
        $user->eatItem($request->all());
        $inventory = $user->inventoryList()->toArray();
        $health = $user->fresh()->health;
        return compact('inventory', 'health');
    }

    public function pickup(Request $request){
        $user = $request->user();
        $user->addItem($request->all());
        $inventory = $user->inventoryList()->toArray();
        return compact('inventory');
    }

    public function damage(Request $request){
        $user = $request->user();
        $user->damage($request->get('damage'));
        $health = $user->fresh()->health;
        if($user->fresh()->isDead()){
            $dead = route('dead');
            return compact('dead', 'health');
        }
        return compact('health');
    }

    public function use(Request $request){
        $user = $request->user();
        $item = Item::find($request->get('item_id'))->first();
        if(!$item->single_use){
            $user->useItem($request->all());
        }
        $inventory = $user->fresh()->inventoryList()->toArray();

        return compact('inventory');
    }

    public function inventory(Request $request){
        $user = $request->user();
        $inventory = $user->fresh()->inventoryList()->toArray();
        return compact('inventory');
    }
}
