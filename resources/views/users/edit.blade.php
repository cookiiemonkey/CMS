@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">My Profile</div>

        <div class="card-body">
                @include('partials.error')
                <form action="{{route('users.update-profile')}}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="from-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                </div>
        
                <div class="from-group mt-3">
                    <label for="about">About Me</label>
                    <textarea class="form-control" cols="5" rows="5" name="about" id="about">{{ $user->about }}</textarea>
                </div>
    
                <button type="submit" class="btn btn-success mt-4">Update Profile</button>
            </form>
        </div>
    </div>
@endsection