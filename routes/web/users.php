<?php

//User-----------------------------------------------------------------
//Update profile
Route::post('admin/users/{user}/update', 'UsersController@update')->name('user.profile.update');
//Update user
// Route::patch('admin/users/{user}/update', 'UsersController@update')->name('user.update');
//Delete user
Route::delete('admin/users/{user}/delete', 'UsersController@delete')->name('user.delete');
//User-----------------------------------------------------------------


//Admin-----------------------------------------------------------------
Route::middleware(['role:admin'])->group(function(){
    //Show all user
    Route::get('admin/users', 'UsersController@index')->name('users.index');

    //attach user a new role
    Route::put('users/{user}/attach', 'UsersController@attach')->name('user.role.attach');
    //detach user a role
    Route::put('users/{user}/detach', 'UsersController@detach')->name('user.role.detach');

});

Route::middleware(['can:view,user'])->group(function(){
    //Show profile
    Route::get('/admin/users/{user}/profile', 'UsersController@show')->name('user.profile.show');
});

?>
