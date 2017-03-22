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

use App\Task;

Route::get('/tasks', function () {

#	$tasks = DB::table('tasks')->get();

	$tasks = Task::all();

/*	$tasks = [
		'Go to the store',
		'Finish screencast',
		'Clean the house',
	];
*/
	return view('tasks.index', compact('tasks'));

/* Just a few different ways of passing in data

	$name = "Ground";
	$age = '34';

	return view('welcome', compact('name', 'age'));

	return view('welcome')->with('name', $name);

    return view('welcome',
    [
    	'name' => $name
    ]
    );
*/
});

Route::get('/tasks/{task}', function($id){

#	$task = DB::table('tasks')->find($id);

	$task = Task::find($id);

	return view('tasks.show', compact('task'));

##	dd($task); //dump and die helper func
});

Route::get('/about', function() {
	return view('about');
});