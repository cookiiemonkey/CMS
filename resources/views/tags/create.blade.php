@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($tag) ? 'Edit Tag' : 'Create Tag'}}
        </div>

        <div class="card-body">
            @include('partials.error')

            <form action="{{ isset($tag) ? route('tags.update', $tag) : route('tags.store')}}" method="POST">
                @if (isset($tag))
                    @method('PUT')
                @endif
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="name" value="{{ isset($tag) ? $tag->name : ''}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        {{ isset($tag) ? 'Update Categroy' : 'Add Tag'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection('content')