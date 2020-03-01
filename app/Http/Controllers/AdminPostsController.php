<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Session;

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
    
    public function store(request $request) {

        $post = Post::firstOrCreate([
            'title' => $request->title
        ]);
        
        $post->title = $request->title;
        $slug = str_slug($request->title, "-");
        $post->slug = $slug;
        $post->body = $request->body;
        $post->save();

        Session::flash('message', 'Successfully added post'); 
        Session::flash('name', $post->title); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.posts.show', $post));
    }

    public function show($id) {
        $post = Post::where('id', $id)->firstOrFail();

        return view('admin.posts.show', compact('post'));
    }
    public function edit($id) {
        $post = Post::where('id', $id)->firstOrFail();

        return view('admin.posts.edit', compact('post'));
    }
    public function update(request $request, $id) {
        $post = Post::where('id', $id)->firstOrFail();

        $post->title = $request->title;
        $slug = str_slug($request->title, "-");
        $post->slug = $slug;
        $post->body = $request->body;
        $post->save();

        Session::flash('message', 'Successfully updated post'); 
        Session::flash('name', $post->title); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.posts.show', $post));
    }

    public function confirmdelete($id) {
        $post = Post::where('id', $id)->firstOrFail();

        return view('admin.posts.confirmdelete', compact('post'));
    }
    
    public function delete($id) {
        $post = Post::where('id', $id)->firstOrFail();
        $post->delete();

        Session::flash('message', 'Successfully deleted post'); 
        Session::flash('name', $post->title); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.posts.index'));
    }
}
