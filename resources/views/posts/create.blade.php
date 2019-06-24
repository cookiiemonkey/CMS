@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">Create Post</div>
        <div class="card-body">

            <form action="{{ route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="from-group">
                    <input type="text" class="form-control" name="title" placeholder="Title">
                </div>
                <div class="from-group mt-3">
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control">Description</textarea>
                </div>
                <div class="from-group mt-3">
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control">Content</textarea>
                </div>
                <div class="from-group mt-3">
                    <input type="text" class="form-control" name="published_at" placeholder="Published_at">
                </div>
                <div class="from-group mt-3">
                    <label for="image">Add Image:</label>
                    <input type="file"class="d-block" name="image" id="image">
                </div>
                
                <button type="submit" class="btn btn-success mt-4">Create Post</button>
            </form>
        </div>
    </div>

@endsection