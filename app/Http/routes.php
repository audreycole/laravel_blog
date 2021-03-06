<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
}); */

// Home page
Route::get('/','PostController@index');
Route::get('/home',['as' => 'home', 'uses' => 'PostController@index']);

// Login page
Route::get('/login', function() {
	return view('login');
});
Route::post('/login/auth', 'UserController@auth');

// Register page
Route::get('/register', function() {
	return view('register');
});
Route::post('/register/auth', 'UserController@create');

// Logout
Route::get('/logout', 'UserController@logout');

// Add a post 
Route::post('/posts', 'PostController@addPost');

// View a post
Route::get('/posts/{post}', 'PostController@show');
