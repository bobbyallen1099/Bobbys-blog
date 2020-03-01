@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2>Edit post</h2>
        </div>

        <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
            @csrf
            <div class="form-group">
                <label for="title">
                    Title
                </label>
                <input name="title" id="title" type="text" class="form-control" value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <label for="body">
                    Body
                </label>
                <textarea name="body" id="body" rows="4" class="form-control">{{ $post->body }}</textarea>
            </div>

            <button class="btn btn-primary">Update</button>

        </form>
    </div>
@endsection
