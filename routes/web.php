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

Route::get('/users/{user}','UsersController@show')->name('users.show');
Route::get('/users/index', 'UsersController@index')->name('users.index');
Route::get('/', 'GamesController@index')->name('games.index');
Route::resource('/games', 'GamesController', ['except' => ['index']]);
Route::resource('/users', 'UsersController',['except' => ['index']]);