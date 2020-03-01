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
        Route::any('/create', 'AdminPostsController@create')->name('create');
        Route::post('/create', 'AdminPostsController@store')->name('store');
        Route::get('/{plan}', 'AdminPostsController@show')->name('show');
        Route::get('/{plan}/edit', 'AdminPostsController@edit')->name('edit');
        Route::put('/{plan}/edit', 'AdminPostsController@update')->name('update');
    });

    // Users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', 'AdminUsersController@index')->name('index');
        Route::get('/create', 'AdminUsersController@create')->name('create');
        Route::post('/create', 'AdminUsersController@store')->name('store');
        Route::get('/{plan}', 'AdminUsersController@show')->name('show');
        Route::get('/{plan}/edit', 'AdminUsersController@edit')->name('edit');
        Route::put('/{plan}/edit', 'AdminUsersController@update')->name('update');
    });
});