@extends('layouts.app')

@section('content')
    <div class="banner">
        <div class="container">
            <h1>{{ $post->title }}</h1>
        </div>
    </div>
    <div class="py-4">
        <div class="container">
            <p>{{ $post->body }}</p>
        </div>
    </div>
@endsection