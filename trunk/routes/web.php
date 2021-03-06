<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    if(Auth::check())
        return redirect()->route('home.index');
    else
        return view('welcome');
});

Auth::routes();

Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');
Route::resource('users', 'UserController');
Route::post('/users/search', [
    'uses' => 'UserController@search',
    'as' => 'users.search'
]);
Route::resource('home', 'HomeController');
Route::resource('events', 'EventController');
Route::resource('meetings', 'MeetingController');
Route::get('/meetings/create/{id}', [
    'uses' => 'MeetingController@create',
    'as' => 'meetings.create'
]);
Route::post('meetings/search/{id}', [
    'uses' => 'MeetingController@search',
    'as' => 'meetings.search'
]);
