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


//User-----------------------------------------------------------------
    //Update profile
    Route::post('admin/users/{user}/update', 'UsersController@update')->name('user.profile.update');
    //Update user
    // Route::patch('admin/users/{user}/update', 'UsersController@update')->name('user.update');
    //Delete user
    Route::delete('admin/users/{user}/delete', 'UsersController@delete')->name('user.delete');
//User-----------------------------------------------------------------

});


//Admin-----------------------------------------------------------------
Route::middleware(['role:admin', 'auth'])->group(function(){
    //Show all user
    Route::get('admin/users', 'UsersController@index')->name('users.index');

});

Route::middleware(['auth', 'can:view,user'])->group(function(){
    //Show profile
    Route::get('/admin/users/{user}/profile', 'UsersController@show')->name('user.profile.show');
});
