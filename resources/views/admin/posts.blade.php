@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Posts</h2>
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
            @foreach ($posts as $posts)
                <tr>
                    <td>{{ $posts->title }}</td>
                    <td>{{ $posts->created_at }}</td>
                    <td>{{ $posts->updated_at }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="" class="btn btn-primary btn-xs">Edit</a>
                            <a href="" class="btn btn-danger btn-xs">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
