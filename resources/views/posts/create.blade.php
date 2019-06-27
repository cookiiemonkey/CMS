@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            {{ isset($post) ? 'Edit Post' : 'Create Post'}}
        </div>
        <div class="card-body">

            <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($post)
                    @method('PUT')
                @endif
                <div class="from-group">
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ isset($post) ? $post->title : ''}}">
                </div>
                <div class="from-group mt-3">
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ isset($post) ? $post->description : 'Description'}}</textarea>
                </div>
                <div class="from-group mt-3">
                    <input id="content" type="hidden" name="content" value= "{{ isset($post) ? $post->content : ''}}">
                    <trix-editor input="content" placeholder="{{ isset($post) ? '' : 'Content'}}"></trix-editor>
                </div>
                <div class="from-group mt-3">
                    <input type="text" class="form-control" name="published_at" placeholder="{{ isset($post) ? $post->published_at : 'Published_At'}}" id="published_at">
                </div>

                @if (isset($post))
                    <div class="form-group mt-3">
                        <img src="{{ asset('/storage/'.$post->image) }}" alt="" style="width: 100%">
                    </div>
                @endif

                <div class="from-group mt-3">
                    <label for="category">Category:</label>
                    <select class="form-control" name="category" id="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (isset($post)) @if($category->id == $post->category_id) selected @endif @endif> 
                                {{ $category->name }} 
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="from-group mt-3">
                    <label for="image">Add Image:</label>
                    <input type="file" class="d-block " name="image" id="image">
                </div>

                <div class="from-group mt-4">
                    <button type="submit" class="btn btn-success">{{ isset($post) ? 'Update Post' : 'Create Post'}}</button>
                </div>


                </form>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true
        })
    </script>
    
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection