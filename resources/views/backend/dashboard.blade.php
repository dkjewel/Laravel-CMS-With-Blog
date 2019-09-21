@extends('backend.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">Dashboard</div>

            <div class="card-body text-center">
                <h1 class="table-success ">Welcome To Dashboard</h1>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in as &nbsp; <span class="text-danger">{{Auth::user()->name}}</span>
            </div>

        </div>
    </div>
@endsection
