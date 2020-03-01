@extends('admin.layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                {{ Session::get('message') }}
                @if(Session::has('name'))
                    <strong>'{{ Session::get('name') }}'</strong>
                @endif
            </div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->body }}</p>
                    <p class="text-muted">{{ $author->name }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-xs">Edit</a>
                <a href="{{ route('admin.posts.confirmdelete', $post) }}" class="btn btn-danger btn-xs">Delete</a>
            </div>
        </div>
    </div>

@endsection
