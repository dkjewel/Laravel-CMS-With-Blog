@extends('backend.app')

@section('content')

    <div class="col-md-8">

        @if(session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="card card-default ">

            <div class="card-header text-center ">Create Category</div>

            <div class="card-body">

                <form action="{{ route('category.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                            <label class="label" for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}">
                        <span
                            class="badge text text-danger"> {{$errors->has('name') ? $errors->first('name'):''}} </span>

                    </div>

                    <div class="form-group text-center ">
                        <button class="btn btn-success ">Save Category</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
