@extends('layouts.app')

@section('content')

    <div class="card card-default">

        <div class="card-header">Users</div>

        <div class="card-body">
            @if ($users->count() > 0)

                <table class="table">
                    <thead>
                        <th>Image</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <img width="60px" height="60px" style="border-radius: 50%" src="{{ Gravatar::src($user->email) }}" alt="">
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                        {{ $user->email }}
                                </td>
                                <td>
                                    @if (!$user->isAdmin())
                                        <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            @else
                <h3 class="text-center">No Users Yet</h3>
            @endif
            
        </div>
    </div>

    <a href="{{route('posts.create')}}" class="btn btn-success mt-2">Add Post</a>
@endsection