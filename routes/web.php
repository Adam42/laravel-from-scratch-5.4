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

	$tasks = DB::table('tasks')->get();


/*	$tasks = [
		'Go to the store',
		'Finish screencast',
		'Clean the house',
	];
*/
	return view('welcome', compact('tasks'));

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

Route::get('/about', function() {
	return view('about');
});