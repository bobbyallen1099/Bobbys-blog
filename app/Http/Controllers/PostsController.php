<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController
{
    /**
     * Returns all posts & renders them
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts/index', [
            'posts' => $posts
        ]);
    }

    /**
     * Returns individual post & renders it
     */
    public function show($slug)
    {

        $post = Post::where('slug', $slug)->firstOrFail();

        return view('posts/show', [
            'post' => $post
        ]);
    }
}