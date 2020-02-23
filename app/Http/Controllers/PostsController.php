<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController
{
    public function index()
    {
        return view('posts/index');
    }

    public function show($slug)
    {

        $post = Post::where('slug', $slug)->firstOrFail();

        return view('posts/show', [
            'post' => $post
        ]);
    }
}