@extends('backend.app')

@section('content')

    <div class="col-md-10">

        @if(session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif


        <div class="card card-default">

            <div class="card-header text-center">Manage Tag
                <a href="{{route('tag.create')}}" class="btn btn-info btn-sm float-right ">Add Tag</a>
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

                    @if($tags->count() > 0)
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>2</td>

                                <td>
                                    <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-info btn-sm">Edit</a>

                                    <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $tag->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h3 class="text-center alert alert-danger">No Tags Yet! Plz Add Some Tag</h3>
                    @endif
                    </tbody>
                </table>

                {{--Delete Modal--}}
                <div class="modal fade" style="margin-top: 110px; margin-left: 50px" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <form action="" method="POST" id="deleteTagForm">
                            @csrf
                            @method('DELETE')

                            <div class="modal-content">

                                <div class="modal-header ">

                                    <h5 class="modal-title " id="deleteModalLabel">Delete Tag</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>

                                <div class="modal-body">
                                    <p class="text-center text-bold">
                                        Are you sure you want to delete this Tag ?
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

            var form = document.getElementById('deleteTagForm');
            form.action = '/tag/' + id;


        }

    </script>
@endsection
