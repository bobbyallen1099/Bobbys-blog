<?php

Route::get('/', 'PagesController@index')->name('home');
Route::get('/posts', 'PostsController@index')->name('posts');
Route::get('/posts/{post}', 'PostsController@show');
