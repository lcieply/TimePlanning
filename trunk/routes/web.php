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
    return view('welcome');
});

Auth::routes();

Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

Route::resource('home', 'HomeController');
Route::resource('mettingsInfo', 'MeetingsInfoController');
Route::resource('events', 'EventController');
Route::resource('plansView', 'PlansViewController');
Route::get('/manageAccount', 'Auth\ManageAccountController@index');
Route::post('/manageAccount/update', [
    'uses' => 'Auth\ManageAccountController@save',
    'as' => 'users.update'
]);