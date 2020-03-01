@extends('layouts.app')

@section('content')
    <div class="banner">
        <div class="container">
            <h1>Homepage</h1>
        </div>
    </div>
    
    <div class="featured-articles">
        <div class="container">
            <h3>Featured posts</h3>
            <div class="row">
                @foreach ($featured_posts as $post)
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
