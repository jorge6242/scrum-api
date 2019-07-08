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

Route::prefix('api')->group(function () {
    Route::post('/login', 'PassportController@login');
    Route::post('/register', 'PassportController@register');
    Route::middleware('auth:api')->group(function () {
        Route::get('/product', 'ProductController@index');
        Route::get('/product/{id}', 'ProductController@show');
        Route::put('/product/{id}', 'ProductController@update');
        Route::delete('/product/{id}', 'ProductController@destroy');
        Route::post('/product', 'ProductController@store');
        Route::resource('/project', 'ProjectController');
        Route::get('/get-available-projects', 'ProjectController@getAvaliableProjects');
        Route::resource('/team', 'TeamController');
        Route::post('/users-team', 'TeamController@createUserTeam');
        Route::resource('/user', 'UserController');
        Route::get('/users-available', 'UserController@availableToTeam');
        Route::get('/user-profile', 'UserController@getUserProfile');
        Route::get('/check-users-team', 'UserController@checkUserTeam');
        Route::resource('/backlog', 'BacklogController');
        Route::get('/main-backlog', 'BacklogController@getMainBacklog');
        Route::get('/check-tasks', 'BacklogController@checkTasksFromSprint');
        Route::get('/get-backlogs-sprint/{id}', 'BacklogController@getBacklogsSprint');
        Route::get('/get-backlogs-from-sprint/{id}', 'BacklogController@getBacklogsFromSprint');
        Route::get('/get-board-from-sprint/{id}', 'BacklogController@getBoardFromSprint');
        Route::resource('/sprint', 'SprintController');
        Route::get('/get-sprints-project/{id}', 'SprintController@getSprintsProject');
        Route::get('/get-sprints-from-project/{id}', 'SprintController@getSprintsFromProject');
        Route::resource('/role', 'RoleController');
    });
});