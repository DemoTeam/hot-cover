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

Route::get('/', array('as' => 'index', 'uses' => 'IndexController@index'));
Route::resource('users', 'UserController');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::get('signup', 'SessionsController@signup');
Route::post('post_create', 'UserController@post_create');
Route::get('leech_photo', 'PostController@leech_photo');
Route::resource('sessions', 'SessionsController');
Route::resource('posts', 'PostController');
Route::resource('questions', 'QuestionController');
Route::resource('leech_photos', 'LeechPhotoController');
Route::get('dump_view', array('as' => 'dump_view', 'uses' => 'CountViewController@dump_view'));

// like routes
Route::post('like', 'LikeController@like');
Route::get('like', 'LikeController@like');
Route::post('disLike', 'LikeController@disLike');
Route::resource('comments', 'CommentController');
Route::post('load_content', 'CommentController@loadContent');
// Admin routes
// Route::resource('admin', 'admin\AdminController');
Route::group(array('prefix' => 'admin'), function() {
  Route::resource('users', 'admin\UserController');
  Route::resource('posts', 'admin\PostController');
});

Route::group(array('prefix' => 'api'), function() {
  Route::group(array('prefix' => 'v1'), function() {
    Route::resource('posts', 'api\v1\PostController');
  });
});

Route::get('admin', 'admin\AdminController@index');

Route::filter('checkAdmin', function(){
  if(Auth::user()->type != "Admin"){
    return Redirect::to('/posts')->with('message', 'Your are not Admin!');
  }
});
Route::controller('socials', 'SocialsController');
