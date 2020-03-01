<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUsersController
{
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(request $request, User $user) {
        $user = User::firstOrCreate([
            'email' => $request->email
        ]);
        
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        Session::flash('message', 'Successfully added user'); 
        Session::flash('name', $post->email); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.users.show', $user));
    }
    public function show($id) {
        $user = User::where('id', $id)->firstOrFail();

        return view('admin.users.show', compact('user'));
    }
    public function edit($id) {
        $user = User::where('id', $id)->firstOrFail();

        return view('admin.users.edit', compact('user'));
    }
    public function update(request $request, $id) {
        $user = User::where('id', $id)->firstOrFail();

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Session::flash('message', 'Successfully updated user'); 
        Session::flash('name', $user->email); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.users.show', $user));
    }

    public function confirmdelete($id) {
        $user = User::where('id', $id)->firstOrFail();

        return view('admin.users.confirmdelete', compact('user'));
    }
    
    public function delete($id) {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();

        Session::flash('message', 'Successfully deleted user'); 
        Session::flash('name', $user->email); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.posts.index'));
    }
}