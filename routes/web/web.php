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
Route::get('/post/{post}', 'PostController@show')->name('post');


//Auth-----------------------------------------------------------------
Route::middleware('auth')->group(function(){
    //show index
    Route::get('/admin/posts', 'PostController@index')->name('post.index');
    //show admin
    Route::get('/admin', 'AdminController@index')->name('admin.index');


});



