@extends('layout')

@section('content')
    <div class="banner">
        <div class="container">
            <h1>Posts</h1>
        </div>
    </div>
    <div class="py-4">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <a href="/posts/{{ $post->slug }}" class="card card-body">
                            <h3>{{ $post->title }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
