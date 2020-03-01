<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class AdminPostsController
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        return view('admin.posts.create');
    }
    
    public function store(request $request, Post $post) {
        $post = Post::firstOrCreate([
            'title' => $request->title
        ]);
        
        $post->title = $request->title;
        $slug = str_slug($request->title, "-");
        $post->slug = $slug;
        $post->body = $request->body;
        $post->save();

        return redirect(route('admin.posts.show', $post));
    }

    public function show(Post $post) {
        return view('admin.posts.show', [
            'post' => $post
        ]);
    }
    public function edit() {}
    public function update() {}
}