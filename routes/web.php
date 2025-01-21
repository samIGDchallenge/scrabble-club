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
//Route::get('/members/{memberId}', 'MemberController@create')->name('members.create');
Route::get('/members/{memberId}', 'MemberController@view')->name('members.view');
Route::post('/members/{memberId}', 'MemberController@update')->name('members.update');
//Route::post('/members/{memberId}', 'MemberController@update')->name('members.update');
