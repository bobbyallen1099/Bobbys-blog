@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2>Update user</h2>
        </div>

        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf
            <div class="form-group">
                <label for="email">
                    Email
                </label>
                <input name="email" id="email" type="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="password">
                    New Password
                </label>
                <input name="password" id="password" type="password" class="form-control">
            </div>
        
            <button class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
