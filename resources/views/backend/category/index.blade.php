@extends('backend.app')

@section('content')

    <div class="col-md-10">

        @if(session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif


        <div class="card card-default">

            <div class="card-header text-center">Manage Categories
                <a href="{{route('category.create')}}" class="btn btn-info btn-sm float-right ">Add Category</a>
            </div>


            <div class="card-body">

                <table class="table table-bordered text-center">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Posts Count</th>
                        <th>Actions</th>
                    </tr>

                    </thead>

                    <tbody>

                    @if($categories->count() > 0)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>2</td>

                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>

                                    <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h3 class="text-center alert alert-danger">No Categories Yet! Plz Add Some Category</h3>
                    @endif
                    </tbody>
                </table>

                {{--Delete Modal--}}
                <div class="modal fade" style="margin-top: 110px; margin-left: 50px" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <form action="" method="POST" id="deleteCategoryForm">
                            @csrf
                            @method('DELETE')

                            <div class="modal-content">

                                <div class="modal-header ">

                                    <h5 class="modal-title " id="deleteModalLabel">Delete Category</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>

                                <div class="modal-body">
                                    <p class="text-center text-bold">
                                        Are you sure you want to delete this category ?
                                    </p>
                                </div>

                                <div class="modal-footer ">

                                    <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Back
                                    </button>
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                                </div>

                            </div>
                        </form>

                    </div>
                </div>
                {{--End Delete Modal--}}

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function handleDelete(id) {

            $('#deleteModal').modal('show');

            var form = document.getElementById('deleteCategoryForm');
            form.action = '/category/' + id;


        }

    </script>
@endsection
