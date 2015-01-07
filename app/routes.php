<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
  $users = User::all();

  return View::make('users')->with('users', $users);
})->before('auth');

Route::resource('users', 'UserController');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::get('signup', 'SessionsController@signup');
Route::post('post_create', 'UserController@post_create');
Route::resource('sessions', 'SessionsController');
Route::resource('posts', 'PostController');