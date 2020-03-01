<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Session;
use Auth;

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

        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        $post = Post::firstOrCreate([
            'title' => $request->title
        ]);
        
        $post->title = $request->title;
        $slug = str_slug($request->title, "-");
        $post->slug = $slug;
        $post->body = $request->body;
        $post->published_by = auth::user()->id;
        $post->save();

        Session::flash('message', 'Successfully added post'); 
        Session::flash('name', $post->title); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.posts.show', $post));
    }

    public function show($id) {
        $post = Post::where('id', $id)->firstOrFail();
        $author = User::where('id', $post->published_by)->firstOrFail();

        return view('admin.posts.show', compact('post', 'author'));
    }
    public function edit($id) {
        $post = Post::where('id', $id)->firstOrFail();

        return view('admin.posts.edit', compact('post'));
    }
    public function update(request $request, $id) {
        $post = Post::where('id', $id)->firstOrFail();

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

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
