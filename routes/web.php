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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/users/following/{user}', 'UsersController@following')->name('users.following');

Route::get('/users/follow/{user}', 'UsersController@follow')->name('users.follow');
Route::get('/users/unfollow/{user}', 'UsersController@unfollow')->name('users.unfollow');

// Route::get('/comment/create','commentController@create')->name('comment.create');
// Route::get('/users/create','UsersController@create')->name('users.create');
Route::get('/users/{user}','UsersController@show')->name('users.show');
Route::get('/', 'GamesController@index')->name('games.index');
Route::resource('/games', 'GamesController', ['except' => ['index']]);
Route::resource('/users', 'UsersController',['except' => ['index']]);
Route::resource('/comments', 'CommentController')->middleware('auth');