@extends('backend.app')

@section('content')

    <div class="col-md-8">

        <div class="card card-default ">

            <div class="card-header text-center ">Edit Category</div>

            <div class="card-body">

                <form action="{{ route('category.update',$category->id) }}" method="POST">
                    @csrf
                    @method("PATCH")

                    <div class="form-group">
                        <label class="label" for="name">Name</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{$category->name}}">
                        <span
                            class="badge text text-danger"> {{$errors->has('name') ? $errors->first('name'):''}} </span>

                    </div>

                    <div class="form-group text-center ">
                        <button class="btn btn-success ">Update Category</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
