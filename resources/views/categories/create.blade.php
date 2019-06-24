@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($category) ? 'Edit Category' : 'Create category'}}
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store')}}" method="POST">
                @if (isset($category))
                    @method('PUT')
                @endif
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="name" value="{{ isset($category) ? $category->name : ''}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        {{ isset($category) ? 'Update Categroy' : 'Add Category'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection('content')