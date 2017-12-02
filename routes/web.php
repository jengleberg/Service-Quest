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
Route::get('/dashboard', 'HomeController@index')->name('dashboard');


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

// Route to close a task for individual user
Route::post('close_task/{task_id}', 'TasksController@close');

/*
|-------------------------------------------------
| Comment Routes
|-------------------------------------------------
*/

// Route to post the comment added to a task
Route::post('comment', 'CommentsController@postComment');

/*
|------------------------------------------------------------------------
| Admin Routes - used to define which routes an admin user has access to.
|------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {

    Route::get('tasks', 'TasksController@index');
    Route::post('close_task/{task_id}', 'TasksController@close');
});
