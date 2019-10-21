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

Route::get('/','HomeController@index')->name('home');
Route::get('/contact','HomeController@contact')->name('contact');
Route::get('/about/{id?}','HomeController@about')->name('about');
Route::get('/demo','DemoController');

//Posts CRUD
//Route::get('/post','PostController@index');
//Route::get('/post/create','PostController@create');
//Route::get('/post/{post}','PostController@show');
//Route::post('/post','PostController@store');
//Route::get('/post/{post}/edit','PostController@edit');
//Route::patch('/post/{post}','PostController@update');
//Route::delete('/post','PostController@destroy');

Route::resource('posts', 'PostController');


Auth::routes();


