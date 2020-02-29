<?php

Route::get('/', 'PagesController@index')->name('home');
Route::get('/posts', 'PostsController@index')->name('posts');
Route::get('/posts/{post}', 'PostsController@show');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/posts', 'AdminController@posts')->name('admin_posts');
Route::get('/admin/users', 'AdminController@users')->name('admin_users');

