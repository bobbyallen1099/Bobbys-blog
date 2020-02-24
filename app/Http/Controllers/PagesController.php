<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController
{
    public function index()
    {

        $featured_posts = Post::take(3)->get();

        return view('index', [
            'featured_posts' => $featured_posts
        ]);
    }
}