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

Route::get('/', function () {
    return view('index');
});

// Members CRUD
Route::get('/members', 'MemberController@getMembers')->name('members');
Route::get('/members/create', 'MemberController@create')->name('members.create');
Route::post('/members', 'MemberController@save')->name('members.save');
Route::get('/members/{memberId}', 'MemberController@view')->name('members.view');
Route::get('/members/{memberId}/edit', 'MemberController@edit')->name('members.edit');
Route::post('/members/{memberId}', 'MemberController@update')->name('members.update');
Route::delete('/members/{memberId}', 'MemberController@delete')->name('members.delete');

Route::get('/games', 'GameController@getGames')->name('games');
Route::get('/leaderboard', 'MemberController@getLeaderboard')->name('leaderboard');

Route::post('/run-game', 'GameController@runGames')->name('run-game');
