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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController');

Route::resource('tag', 'TagController');

Route::resource('post', 'PostController');

Route::get('trash-post', 'PostController@trashPost')->name('post.trash');

Route::put('restore-post/{post}', 'PostController@restore')->name('post.restore');
