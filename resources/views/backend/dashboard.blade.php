@extends('backend.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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

                        You are logged in!
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
