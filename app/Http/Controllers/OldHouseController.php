<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OldHouseController extends Controller
{

    public function corridor(Request $request){
        $user = $request->user();
        if($this->checkLocation($user, ['start', 'oldhouse.bedroom', 'oldhouse.bathroom', 'oldhouse.small_bedroom', 'oldhouse.corridor', 'oldhouse.hallway'])){
            $user->location = 'oldhouse.corridor';
            $user->save();

            return view('game.oldhouse.corridor');
        }

        return redirect()->route('home');
    }

    public function bedroom(Request $request){
        $user = $request->user();
        if($this->checkLocation($user, ['oldhouse.corridor', 'oldhouse.bedroom'])){
            $user->location = 'oldhouse.bedroom';
            $user->save();

            return view('game.oldhouse.bedroom');
        }

        return redirect()->route('home');
    }

    public function bathroom(Request $request){
        $user = $request->user();
        if($this->checkLocation($user , ['oldhouse.corridor', 'oldhouse.bathroom'])){
            $user->location = 'oldhouse.bathroom';
            $user->save();

            return view('game.oldhouse.bathroom');
        }

        return redirect()->route('home');
    }

    public function small_bedroom(Request $request){
        $user = $request->user();
        if($this->checkLocation($user, ['oldhouse.corridor', 'oldhouse.small_bedroom'])){
            $user->location = 'oldhouse.small_bedroom';
            $user->save();

            return view('game.start');
        }

        return redirect()->route('home');
    }

    public function kitchen(Request $request){
        $user = $request->user();
        if($this->checkLocation($user, ['oldhouse.kitchen', 'oldhouse.bedroom', 'oldhouse.hallway'])){
            $user->location = 'oldhouse.kitchen';
            $user->save();

            return view('game.oldhouse.kitchen');
        }

        return redirect()->route('home');
    }

    public function hallway(Request $request){
        $user = $request->user();
        if($this->checkLocation($user, ['oldhouse.kitchen', 'oldhouse.hallway', 'oldhouse.corridor'])){
            $user->location = 'oldhouse.hallway';
            $user->save();

            return view('game.oldhouse.hallway');
        }

        return redirect()->route('home');
    }

    public function garden(Request $request){
        $user = $request->user();
        if($this->checkLocation($user, ['oldhouse.kitchen', 'oldhouse.hallway', 'oldhouse.garden'])){
            $user->location = 'oldhouse.garden';
            $user->save();

//            return view('game.oldhouse.garden');
            return view('game.fin');
        }

        return redirect()->route('home');
    }

    private function checkLocation($user, $allowed){
        return in_array($user->location, $allowed);
    }
}
