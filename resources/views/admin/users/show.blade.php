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
            <div class="col">
                <h2>{{ $user->email }}</h2>
                <div>
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-xs">Edit</a>
                    <a href="{{ route('admin.users.confirmdelete', $user) }}" class="btn btn-danger btn-xs">Delete</a>
                </div>
            </div>
        </div>
    </div>

@endsection
