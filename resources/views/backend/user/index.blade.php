@extends('backend.app')

@section('content')

    <div class="col-md-10">

        @if(session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif


        <div class="card card-default">

            <div class="card-header text-center">Manage Users
            </div>


            <div class="card-body">

                <table class="table table-bordered text-center">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>

                    </thead>

                    <tbody>

                    @if($users->count() > 0)
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>

                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info btn-sm">Assign Role</a>

                                    <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $user->id }})">
                                        Delete User
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h3 class="text-center alert alert-danger">No User Data Available</h3>
                    @endif
                    </tbody>
                </table>

                {{--Delete Modal--}}
                <div class="modal fade" style="margin-top: 110px; margin-left: 50px" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <form action="" method="POST" id="deleteUserForm">
                            @csrf
                            @method('DELETE')

                            <div class="modal-content">

                                <div class="modal-header ">

                                    <h5 class="modal-title " id="deleteModalLabel">Delete User</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>

                                <div class="modal-body">
                                    <p class="text-center text-bold">
                                        Are you sure you want to delete this User ?
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

            var form = document.getElementById('deleteUserForm');
            form.action = '/user/' + id;


        }

    </script>
@endsection
