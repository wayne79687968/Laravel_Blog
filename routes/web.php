<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('blog', function() {
    return view('home');
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::get('/post/{post}', 'PostController@index')->name('post');
