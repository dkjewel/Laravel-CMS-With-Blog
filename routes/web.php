<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController');

Route::resource('tag', 'TagController');

Route::resource('post', 'PostController');

//For Trash Post
Route::get('trash-post', 'PostController@trashPost')->name('post.trash');
Route::put('restore-post/{post}', 'PostController@restore')->name('post.restore');


Route::resource('user', 'UsersController')->middleware(['auth','admin']);
