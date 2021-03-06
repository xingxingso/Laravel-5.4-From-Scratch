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

// App::bind('App\Billing\Stripe', function () {
// App::singleton('App\Billing\Stripe', function () {
//     return new \App\Billing\Stripe(config('services.stripe.secret'));
// });

// $stripe = App::make('App\Billing\Stripe');
// $stripe = resolve('App\Billing\Stripe');
// $stripe = app('App\Billing\Stripe');

// App::instance('App\Billing\Stripe', $stripe);

// dd($stripe);
// dd(resolve('App\Billing\Stripe'));

// controller => PostsController
// Eloquent model => Post
// migration => create_posts_table
Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

// Route::get('/posts/tags/{tag}', 'PostsController@index');
Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}/comments', 'CommentsController@store');

// Route::get('/register', 'AuthController@register');
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
// Route::get('/login', 'AuthController@login');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
