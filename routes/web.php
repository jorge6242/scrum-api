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
        Route::resource('/team', 'TeamController');
        Route::post('/users-team', 'TeamController@createUserTeam');
        Route::resource('/user', 'UserController');
        Route::get('/users-available', 'UserController@availableToTeam');
        Route::resource('/backlog', 'BacklogController');
        Route::get('/main-backlog', 'BacklogController@getMainBacklog');
        Route::resource('/sprint', 'SprintController');
    });
});