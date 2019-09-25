@extends('backend.app')

@section('content')

    <div class="col-md-10">

        @if(session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif


        {{--        @if(session()->has('success-trash'))--}}
        {{--            <div class="alert alert-success text-center">--}}
        {{--                {{ session()->get('success-trash') }}--}}

        {{--                @foreach($posts as $post)--}}
        {{--                    <form action="{{route('post.restore',$post->id)}}" method="POST">--}}
        {{--                        @csrf--}}
        {{--                        @method('PUT')--}}
        {{--                        <button type="submit" class="btn btn-sm btn-secondary">Undo</button>--}}
        {{--                    </form>--}}
        {{--                @endforeach--}}
        {{--            </div>--}}
        {{--        @endif--}}


        <div class="card card-default">

            <div class="card-header text-center">Manage Trashed Post</div>


            <div class="card-body">

                <table class="table table-bordered text-center">

                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Body</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                    </thead>

                    <tbody>

                    @if($trashedPosts->count() > 0)
                        @foreach($trashedPosts as $trashedPost)
                            <tr>
                                <td>{{ $trashedPost->title }}</td>

                                <td>
                                    <img src="{{asset($trashedPost->image)}}" height="40" width="40">
                                </td>

                                <td>{!! str_limit(strip_tags($trashedPost->body), $limit = 10, $end = '...') !!}</td>

                                <td>
                                    @if($trashedPost->status == true)
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-danger">Not Published</span>
                                    @endif
                                </td>

                                <td>

                                    <form action="{{route('post.restore',$trashedPost->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <a class="btn btn-danger btn-sm"
                                           onclick="handleDelete({{ $trashedPost->id }})">
                                            Delete
                                        </a>

                                        <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h3 class="text-center alert alert-danger">No Trash Post Yet!</h3>
                    @endif
                    </tbody>
                </table>

                {{--Delete Modal--}}
                <div class="modal fade" style="margin-top: 110px; margin-left: 50px" id="deleteModal" tabindex="-1"
                     role="dialog" aria-labelledby="deleteModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <form action="" method="POST" id="deletePostForm">
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
                                        Are you sure you want to Delete this Post ?
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

            var form = document.getElementById('deletePostForm');
            form.action = '/post/' + id;


        }

    </script>
@endsection
