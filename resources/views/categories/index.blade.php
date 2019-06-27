@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">Categories</div>
        <div class="card-body">
            @if ($categories->count() > 0)

                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Posts Count</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                    {{ $category->posts->count() }}
                                </td>
                                <td>
                                    <button class="btn btn-danger float-right" onclick="handleDelete({{ $category->id }})">Delete</button>
                                    <a href="{{ route('categories.edit', $category->id)}}" style="color:white" class="btn btn-info float-right mr-3">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="" method="POST" id="deleteCategoryForm">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center text-bold">
                                        Are you sure you want to delete this category?
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
                <h3 class="text-center">No Categories Yet</h3>
            @endif
            
    </div>
    </div>
    <a href="{{route('categories.create')}}" class="btn btn-success mt-2">Add Category</a>
@endsection('content')

@section('scripts')
    <script>
        function handleDelete(id) {

            
            var form = document.getElementById('deleteCategoryForm')
            form.action = '/categories/' + id 
            $('#deleteModal').modal('show')
        }
    </script>
@endsection('scripts')