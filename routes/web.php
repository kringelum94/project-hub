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

Route::group(['middleware' => 'guest'], function () {
    Route::view('/', 'welcome');
    Route::view('/about', 'about');
    Route::view('/features', 'features');
});

Route::group(['middleware' => 'auth'], function () {
    // Project routes
    Route::get('/projects', 'ProjectsController@index');
    Route::get('/projects/create', 'ProjectsController@create');
    Route::get('/projects/{project}', 'ProjectsController@show');
    Route::get('/projects/{project}/edit', 'ProjectsController@edit');
    Route::patch('/projects/{project}', 'ProjectsController@update');
    Route::post('/projects', 'ProjectsController@store');
    Route::delete('/projects/{project}', 'ProjectsController@destroy');

    // Invitation routes
    Route::get('/projects/{project}/invitations', 'ProjectInvitationsController@create');
    Route::post('/projects/{project}/invitations', 'ProjectInvitationsController@store');

    // Tasklist routes
    Route::get('/projects/{project}/tasks', 'ProjectTasksController@index');
    Route::get('/projects/{project}/tasks/create', 'ProjectTasksController@create');
    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

    // Single task routes
    Route::get('/projects/{project}/tasks/{tasklist}/create', 'ProjectTaskController@create');
    Route::post('/projects/{project}/tasks/{tasklist}', 'ProjectTaskController@store');
    Route::patch('/projects/{project}/task/{task}', 'ProjectTaskController@update');
});

Auth::routes();


