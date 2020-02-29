@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard</h2>
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body">
                        <a href="{{ route('admin_posts') }}">Posts</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body">
                        <a href="{{ route('admin_users') }}">Users</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    
</div>
@endsection
