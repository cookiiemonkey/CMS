@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img src="{{ asset('/storage/'.$post->image) }}" width="120px" height="80px" alt="">
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                <a href="" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-danger ">Trash</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{route('posts.create')}}" class="btn btn-success mt-2">Add Post</a>
@endsection