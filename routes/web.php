<?php

/*

|--------------------------------------------------------------------------

| Application Routes

|--------------------------------------------------------------------------

*/

Auth::routes();

Route::get('/', function ()
    {
        return view('welcome');
    }
);

Route::middleware('auth')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/goals', 'GoalController@index');

    Route::resource('/goal', 'GoalController');

    Route::resource('/consequence', 'consequenceController');

    Route::resource('/step', 'stepController');

    Route::get('/goalsapi', 'GoalController@json');

});
//
//Route::resource('/usersgoals', 'UsersGoalsController');
