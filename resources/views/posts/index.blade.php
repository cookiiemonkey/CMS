@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">

        </div>
    </div>

    <a href="{{route('posts.create')}}" class="btn btn-success mt-2">Add Post</a>
@endsection