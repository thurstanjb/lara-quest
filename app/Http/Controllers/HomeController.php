<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = auth()->user()->location;
        return redirect()->route($location);
    }

    public function start(){
        return view('game.start');
    }

    public function dead(Request $request){
        $user = $request->user();
        $user->location = 'dead';
        $user->save();

        return view('game.dead');
    }

    public function reset(Request $request){
        $user = $request->user();
        $user->reset();
        return redirect()->route('home');
    }
}
