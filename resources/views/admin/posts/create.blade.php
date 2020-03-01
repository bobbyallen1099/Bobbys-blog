@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card card-body">
            <div class="d-flex justify-content-between mb-4">
                <h2>Add new post</h2>
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

            <form method="POST" action="{{ route('admin.posts.create') }}">
                @csrf
                <div class="form-group">
                    <label for="title">
                        Title *
                    </label>
                    <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror">
                </div>

                <div class="form-group">
                    <label for="body">
                        Body *
                    </label>
                    <textarea name="body" id="body" rows="4" class="form-control @error('body') is-invalid @enderror"></textarea>
                </div>

                <button class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
@endsection

