<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    if(Auth::check()){
        return redirect()->route('home');
    }
    return view('welcome');
});

Route::get('/testing', function(){
   return 'Testing page';
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('start', 'HomeController@start')->name('start');
    Route::get('dead', 'HomeController@dead')->name('dead');
    Route::get('reset', 'HomeController@reset')->name('reset');


    Route::prefix('old-house')->name('oldhouse.')->group(function(){
        Route::get('corridor', 'OldHouseController@corridor')->name('corridor');
        Route::get('bedroom', 'OldHouseController@bedroom')->name('bedroom');
        Route::get('bathroom', 'OldHouseController@bathroom')->name('bathroom');
        Route::get('small-bedroom', 'OldHouseController@small_bedroom')->name('small_bedroom');



    });

    Route::prefix('api')->group(function(){
        Route::post('eat', 'ApiController@eat')->name('eat');
        Route::post('pickup', 'ApiController@pickup')->name('pickup');
        Route::post('damage', 'ApiController@damage')->name('damage');
        Route::post('use', 'ApiController@use')->name('use');
        Route::get('inventory', 'ApiController@inventory')->name('inventory');

    });

    Route::prefix('test')->name('test.')->group(function(){
        Route::get('make-inventory', 'TestController@makeInventory')->name('make-inventory');
        Route::get('clear-inventory', 'TestController@clearInventory')->name('clear-inventory');
    });
});

