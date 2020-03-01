<?php

namespace App\Http\Controllers;

use App\Post;

class AdminUsersController
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create() {}
    public function store() {}
    public function show() {}
    public function edit() {}
    public function update() {}
}