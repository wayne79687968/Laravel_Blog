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

Route::middleware('auth')->group(function(){
    //show index
    Route::get('/admin/posts', 'PostController@index')->name('post.index');
    //show admin
    Route::get('/admin', 'AdminController@index')->name('admin.index');

//Post-----------------------------------------------------------------
    //show post
    Route::post('/admin/posts', 'PostController@store')->name('post.store');
    //create post
    Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
    // edit post
    Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');
    // update post
    Route::patch('/admin/posts/{post}/update', 'PostController@update')->middleware('can:view,post')->name('post.update');
    //delete post
    Route::delete('/admin/posts/{post}/delete', 'PostController@delete')->middleware('can:view,post')->name('post.delete');
//Post-----------------------------------------------------------------

//User-----------------------------------------------------------------
    //Show profile
    Route::get('/admin/users/{user}/profile', 'UsersController@show')->name('user.profile.show');
    //Update profile
    Route::post('admin/users/{user}/update', 'UsersController@update')->name('user.profile.update');
    //Update user
    // Route::patch('admin/users/{user}/update', 'UsersController@update')->name('user.update');
    //Delete user
    Route::delete('admin/users/{user}/delete', 'UsersController@delete')->name('user.delete');
//User-----------------------------------------------------------------

});

Route::middleware('role:admin')->group(function(){
    //Show all user
    Route::get('admin/users', 'UsersController@index')->name('users.index');

});
