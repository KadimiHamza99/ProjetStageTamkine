<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/','App\Http\Controllers\PlatformsController@index')->name('index');
Route::get('/warning','App\Http\Controllers\PlatformsController@warning');

//test live search



Route::middleware(['auth'])->group(function(){
    Route::resource('/platforms', 'App\Http\Controllers\PlatformsController');
    Route::get('/listePlatforms','App\Http\Controllers\PlatformsController@liste')->name('listePlatforms');
    Route::resource('/responsables','App\Http\Controllers\ResponsablesController');
    Route::get('/home','App\Http\Controllers\PlatformsController@nombre')->name('home');
    Route::get('/live_search', 'App\Http\Controllers\LiveSearch@index')->name('live_search.index');
    Route::get('/live_search/action', 'App\Http\Controllers\LiveSearch@action')->name('live_search.action');
});
Auth::routes(['register'=>false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
