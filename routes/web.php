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

    $tasks=[
        'go shipping',
        'go in the park',
        'go to the school'
    ];

//    return view('welcome',[
//        'tasks' => $task
//    ]);

    return view('welcome')->withTasks($tasks);
});

Route::get("/contact", function () {
    return view('contact');
});

Route::get("/about/{id?}", function ($id="0") {
    return view('about')->withId($id);
});
