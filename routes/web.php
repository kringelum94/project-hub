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
    Route::get('/projects', 'ProjectsController@index');
    Route::get('/projects/create', 'ProjectsController@create');
    Route::get('/projects/{project}', 'ProjectsController@show');
    Route::post('/projects', 'ProjectsController@store');

    Route::get('/projects/{project}/tasks', 'TasksController@index');
    Route::get('/projects/{project}/tasks/create', 'TasksController@create');
    Route::post('/projects/{project}/tasks', 'TasksController@store');
});

Auth::routes();


