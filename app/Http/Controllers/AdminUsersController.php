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

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::firstOrCreate([
            'email' => $request->email
        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        Session::flash('message', 'Successfully added user'); 
        Session::flash('name', $user->email); 
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

        // If the email has changed
        if($request->email != $user->email) {
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            ]);
        } else {
            // Remove unique:users
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            ]);   
        }

        $user->name = $request->name;
        $user->email = $request->email;

        // Change password if something is inputted
        if($request->password != '') {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        Session::flash('message', 'Successfully updated user'); 
        Session::flash('name', $user->name); 
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
        Session::flash('name', $user->name); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.users.index'));
    }
}