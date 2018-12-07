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

    Route::get('/goals', 'GoalController@index');

    Route::resource('/goal', 'GoalController');

    Route::resource('/consequence', 'consequenceController');

    Route::resource('/step', 'stepController');

    Route::get('/goalsapi', 'GoalController@jsonGoals');

    Route::get('/consequenceapi/{id}', 'GoalController@jsonConsequences');

    Route::get('/stepapi/{id}', 'GoalController@jsonSteps');

    Route::get('/home', 'HomeController@index')->name('home');

});
//
//Route::resource('/usersgoals', 'UsersGoalsController');
