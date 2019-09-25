@extends('backend.app')

@section('content')

    <div class="col-md-10">

        @if(session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif


        <div class="card card-default">

            <div class="card-header text-center">Manage Post
                <a href="{{route('post.create')}}" class="btn btn-info btn-sm float-right ">Add Post</a>
            </div>


            <div class="card-body">

                <table class="table table-bordered text-center table-responsive-md">

                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Body</th>
                        <th>Status</th>
                        <th colspan="2">Actions</th>
                    </tr>

                    </thead>

                    <tbody>

                    @if($posts->count() > 0)
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>

                                <td>
                                    <img src="{{asset($post->image)}}" height="40" width="40">
                                </td>

                                <td>{{str_limit( $post->body,20) }}</td>

                                <td>
                                    @if($post->status == true)
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-danger">Not Published</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('post.show', $post->id) }}"
                                       class="btn btn-success btn-sm">Show</a>

                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>

                                </td>
                                <td>
                                    <form>
                                        <button class="btn btn-danger btn-sm">Trash</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <h3 class="text-center alert alert-danger">No Tags Yet! Plz Add Some Post</h3>
                    @endif
                    </tbody>
                </table>


            </div>
        </div>
    </div>

@endsection
