@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2>Add new post</h2>
        </div>

        <form method="POST" action="{{ route('admin.posts.create') }}">
            @csrf
            <div class="form-group">
                <label for="title">
                    Title
                </label>
                <input name="title" id="title" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="body">
                    Body
                </label>
                <textarea name="title" id="title" rows="4" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
