<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Session;
use Auth;

class AdminPostsController
{
    /**
     * Show all posts
     * @return Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show create form
     * @return Response
     */
    public function create() {
        return view('admin.posts.create');
    }
    
    /**
     * Store a new post
     * @param request $request
     * @return Response
     */
    public function store(request $request) {

        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        $post = Post::create();
        $post->title = $request->title;
        $post->slug = str_slug($request->title, "-");
        $post->body = $request->body;
        $post->published_by = auth::user()->id;
        $post->save();

        Session::flash('message', 'Successfully added post'); 
        Session::flash('name', $post->title); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.posts.show', $post));
    }

    /**
     * Show post
     * @param Post $post
     * @return Response
     */
    public function show(Post $post) {
        $author = User::where('id', $post->published_by)->firstOrFail();

        return view('admin.posts.show', compact('post', 'author'));
    }

    /**
     * Show edit form
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post) {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update post
     * @param request $request
     * @param Post $post
     * @return Response
     */
    public function update(request $request, Post $post) {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post->title = $request->title;
        $post->slug = str_slug($request->title, "-");
        $post->body = $request->body;
        $post->save();

        Session::flash('message', 'Successfully updated post'); 
        Session::flash('name', $post->title); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.posts.show', $post));
    }

    /**
     * Show confirm delete post
     * @param Post $post
     * @return Response
     */
    public function confirmdelete(Post $post) {
        return view('admin.posts.confirmdelete', compact('post'));
    }
    
    /**
     * Delete post
     * @param Post $post
     * @return Redirect
     */
    public function delete(Post $post) {
        $post->delete();

        Session::flash('message', 'Successfully deleted post'); 
        Session::flash('name', $post->title); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.posts.index'));
    }
}
