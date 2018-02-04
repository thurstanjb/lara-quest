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

    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/start', 'HomeController@start')->name('start');

    Route::prefix('test')->name('test.')->group(function(){
       Route::get('make-inventory', 'TestController@makeInventory')->name('make-inventory');
       Route::get('clear-inventory', 'TEstController@clearInventory')->name('clear-inventory');
    });
});

