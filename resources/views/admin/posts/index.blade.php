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
        <div class="d-flex justify-content-between mb-4">
            <h2>Posts</h2>
            <div>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Add new post</a>
            </div>
        </div>

        <div class="card card-body p-0">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th class="border-top-0">Title</th>
                        <th class="border-top-0">Created on</th>
                        <th class="border-top-0">Modified on</th>
                        <th class="border-top-0" width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a></td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-xs">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
