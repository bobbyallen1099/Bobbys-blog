@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2>Posts</h2>
            <div>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Add new post</a>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Created on</th>
                    <th>Modified on</th>
                    <th width="150">Actions</th>
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
                                <a href="{{ route('admin.posts.update', $post) }}" class="btn btn-danger btn-xs">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
