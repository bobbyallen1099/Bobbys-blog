<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

class PostsController
{
    /**
     * Returns all posts & renders them
     */
    public function index()
    {
        $posts = Post::latest()->paginate(9);


        return view('posts/index', compact('posts'));
    }

    /**
     * Returns individual post & renders it
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $author = User::where('id', $post->published_by)->firstOrFail();

        return view('posts/show', compact('post', 'author'));
    }
}