<?php

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

?>
