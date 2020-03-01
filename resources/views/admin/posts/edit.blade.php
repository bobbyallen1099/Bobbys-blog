@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2>Edit post</h2>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
            @csrf
            <div class="form-group">
                <label for="title">
                    Title
                </label>
                <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <label for="body">
                    Body
                </label>
                <textarea name="body" id="body" rows="4" class="form-control @error('body') is-invalid @enderror">{{ $post->body }}</textarea>
            </div>

            <button class="btn btn-primary">Update</button>

        </form>
    </div>
@endsection
