@extends('layout')

@section('content')
    <div class="py-4 bg-dark text-white">
        <div class="container">
            <a href="/posts/"><h4 class="text-muted">Posts</h4></a>
            <h1>{{ $post->title }}</h1>
        </div>
    </div>
    <div class="py-4">
        <div class="container">
            <p>{{ $post->body }}</p>
        </div>
    </div>
@endsection