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

Route::get('/home', 'HomeController@index');
Route::get('/mettingsInfo', 'MettingsInfoController@index');
Route::get('/plansView', 'PlansViewController@index');
//Na wypadek gdyby ktos uzywal samych malych liter
Route::get('/mettingsinfo', 'MettingsInfoController@index');
Route::get('/plansview', 'PlansViewController@index');


