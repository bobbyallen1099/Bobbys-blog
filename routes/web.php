<?php

// Front view
Route::get('/', 'PagesController@index')->name('home');
Route::get('/posts', 'PostsController@index')->name('posts');
Route::get('/posts/{post}', 'PostsController@show');

// Auth routes
Auth::routes();

// Admin routes
Route::get('/admin', 'AdminController@index')->name('admin');
Route::prefix('admin')->name('admin.')->group(function () {

    // Posts
    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/', 'AdminPostsController@index')->name('index');
        Route::get('/create', 'AdminPostsController@create')->name('create');
        Route::post('/create', 'AdminPostsController@store')->name('store');
        Route::get('/{plan}', 'AdminPostsController@show')->name('show');
        Route::get('/{plan}/edit', 'AdminPostsController@edit')->name('edit');
        Route::post('/{plan}/edit', 'AdminPostsController@update')->name('update');
        Route::get('/{plan}/delete', 'AdminPostsController@confirmdelete')->name('confirmdelete');
        Route::post('/{plan}/delete', 'AdminPostsController@delete')->name('delete');
    });

    // Users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', 'AdminUsersController@index')->name('index');
        Route::get('/create', 'AdminUsersController@create')->name('create');
        Route::post('/create', 'AdminUsersController@store')->name('store');
        Route::get('/{user}', 'AdminUsersController@show')->name('show');
        Route::get('/{user}/edit', 'AdminUsersController@edit')->name('edit');
        Route::post('/{user}/edit', 'AdminUsersController@update')->name('update');
        Route::get('/{user}/delete', 'AdminUsersController@confirmdelete')->name('confirmdelete');
        Route::post('/{user}/delete', 'AdminUsersController@delete')->name('delete');
    });
});