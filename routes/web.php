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

// use App\Task;

// Route::get('/', function () {
// Route::get('/tasks', function () {
//     // $name = 'Kant';
//     // $age = 31;
//     // return view('welcome', [
//     //     'name' => $name, 
//     // ]);
//     // return view('welcome', compact('name', 'age'));
//     // return view('welcome')->with('name', 'New World');

//     // $tasks = [
//     //     'Go to the store',
//     //     'Finish my screencast',
//     //     'Clean the house'
//     // ];

//     // $tasks = DB::table('tasks')->get();
//     // $tasks = DB::table('tasks')->latest()->get();

//     // $tasks = App\Task::all();
//     $tasks = Task::all();

//     // return $tasks;

//     // return view('welcome', compact('tasks'));
//     return view('tasks.index', compact('tasks'));
// });

// Route::get('/tasks/{task}', function ($id) {
// // Route::get('/tasks/{task}', function (Task $id) {
//     // dd($id);
//     // $task = DB::table('tasks')->find($id);
//     // dd($task);
    
//     // $task = App\Task::find($id);
//     $task = Task::find($id);
//     return view('tasks.show', compact('task'));
// });

// Route::get('/tasks', 'TasksController@index');
// Route::get('/tasks/{task}', 'TasksController@show');


// controller => PostsController
// Eloquent model => Post
// migration => create_posts_table
Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');
