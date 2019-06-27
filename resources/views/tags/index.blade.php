@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">Tags</div>
        <div class="card-body">
            @if ($tags->count() > 0)

                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Posts Count</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{$tag->name}}</td>
                                <td>
                                    {{ $tag->posts->count() }}
                                </td>
                                <td>
                                    <button class="btn btn-danger float-right" onclick="handleDelete({{ $tag->id }})">Delete</button>
                                    <a href="{{ route('tags.edit', $tag->id)}}" style="color:white" class="btn btn-info float-right mr-3">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="" method="POST" id="deleteTagForm">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center text-bold">
                                        Are you sure you want to delete this tag?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">NO!</button>
                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            @else
                <h3 class="text-center">No Tags Yet</h3>
            @endif
            
    </div>
    </div>
    <a href="{{route('tags.create')}}" class="btn btn-success mt-2">Add Tag</a>
@endsection('content')

@section('scripts')
    <script>
        function handleDelete(id) {

            
            var form = document.getElementById('deleteTagForm')
            form.action = '/tags/' + id 
            $('#deleteModal').modal('show')
        }
    </script>
@endsection('scripts')