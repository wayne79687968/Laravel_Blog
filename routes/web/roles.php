<?php

Route::get('/roles', 'RolesController@index')->name('role.index');

Route::post('/roles', 'RolesController@store')->name('role.store');

Route::get('/roles/{role}/edit', 'RolesController@edit')->name('role.edit');

Route::put('/roles/{role}/update', 'RolesController@update')->name('role.update');

Route::delete('/roles/{role}/delete', 'RolesController@delete')->name('role.delete');
//attach user a new role
Route::put('roles/{role}/attach', 'RolesController@attach')->name('role.permission.attach');
//detach user a role
Route::put('roles/{role}/detach', 'RolesController@detach')->name('role.permission.detach');


?>
