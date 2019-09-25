@extends('backend.app')



@section('content')

    <div class="col-md-12 mt-2">



        <div class="row">

            {{--Post Details Part--}}
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header bg-success">
                        <h2>
                            {{ $post->title }}
                        </h2>

                        <small>Posted By
                            <strong>
                                <a href="">{{ $post->user->name }}</a>
                            </strong>
                            on {{ $post->created_at->toFormattedDateString() }}
                        </small>
                    </div>

                    <div >

                    </div>

                    <div class="card-body">
                        {!! $post->body !!}
                    </div>

                </div>
                <a href="{{ route('post.index') }}" class="btn btn-danger btn-sm">BACK</a>
            </div>


            {{--Rest Part--}}
            <div class="col-md-4">


                    <div class="card ">
                        <div class="card-header bg-info">
                            <h3 class="card-title">Category</h3>
                        </div>
                        <div class="card-body">
                            @if($post->category)
                                <span>{{$post->category->name }}</span>
                            @endif
                        </div>

                    </div>


                    <div class="card ">
                        <div class="card-header bg-info">
                            <h3 class="card-title">Tags</h3>
                        </div>
                        <div class="card-body">
                            @foreach($post->tags as $tag)
                                <span>{{ $tag->name }} </span>
                            @endforeach
                        </div>

                    </div>


                    <div class="card ">
                        <div class="card-header bg-info">
                            <h3 class="card-title"> Featured Image</h3>
                        </div>
                        <div class="card-body text-center">
                            <img class="img-responsive thumbnail"
                                 src="{{ asset($post->image) }}" alt="" height="200" width="200">
                        </div>

                    </div>


            </div>

        </div>

    </div>
@endsection




