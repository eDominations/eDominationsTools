<?php

Use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use APP\User;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('battle', 'BattlesController');
Route::resource('calculator', 'AjaxController');
Route::resource('battle-history','BattleHistory');
Route::resource('battle-mu', 'BattleMUController');
Route::resource('country', 'Country');
Route::resource('players', 'PlayersController');
Route::resource('shame' ,'Shame');
Route::get('students','AjaxController@index');
Route::get('/student/read-data','AjaxController@readData');
Route::get('calculator-search', 'AutoCompleteController@search');