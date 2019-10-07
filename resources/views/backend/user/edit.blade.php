@extends('backend.app')

@section('content')

    <div class="col-md-8">

        <div class="card card-default ">

            <div class="card-header text-center ">Edit User</div>

            <div class="card-body">

                <form action="{{ route('user.update',$user->id) }}" method="POST">
                    @csrf
                    @method("PATCH")


                    <div class="form-group">
                        <label class="label" for="title">Select Role</label>
                        <select class="form-control" name="role">

                            <option value="{{$user->role}}">{{$user->role}}</option>

                            <option value="admin">admin</option>
                            <option value="author">author</option>
                            <option value="user">user</option>

                        </select>

                        <span
                            class="badge text text-danger"> {{$errors->has('role') ? $errors->first('role'):''}} </span>

                    </div>

                    <div class="form-group text-center ">
                        <button class="btn btn-success ">Update User</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
