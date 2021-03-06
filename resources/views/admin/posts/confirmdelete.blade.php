@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('admin.posts.delete', $post) }}">
                    @csrf

                    <div class="alert alert-danger d-flex align-items-center justify-content-between">
                        <span>Are you sure you want to delete this post?</span>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <div class="card card-body">
                    <h2>{{ $post->title }}</h2>
                    <p class="m-0">{{ $post->body }}</h2>
                </div>
            </div>
        </div>
    </div>

@endsection
