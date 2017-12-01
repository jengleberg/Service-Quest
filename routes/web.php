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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Home page route
Route::get('/home', 'HomeController@index')->name('home');


/*
|-------------------------------------------------
| Task Routes
|-------------------------------------------------
*/

// Route to open the form to show the new task page
Route::get('/tasks/create', 'TasksController@create');

// Route to store the newly created task in the DB
Route::post('/tasks/create', 'TasksController@store');

// Route to show the tasks for an individual user
Route::get('/tasks/user', 'TasksController@userTasks');

// Route to show single task for a user
Route::get('/tasks/{task_id}', 'TasksController@show');
