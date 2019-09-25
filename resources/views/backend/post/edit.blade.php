@extends('backend.app')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
@endsection


@section('content')

    <div class="col-md-12">

        <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!--Add Post Title,Category and Tag-->

            <div class="row">

                <!--Add Post Title-->
                <div class="col-md-8">

                    @if(session()->has('success'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <div class="card mt-2">

                        <div class="card-header text-center">Add New Post</div>

                        <div class="card-body">

                            <div class="form-group">
                                <label class="label" for="title">Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       value="{{$post->title}}">
                                <span
                                    class="badge text text-danger"> {{$errors->has('title') ? $errors->first('title'):''}} </span>

                            </div>


                            <div class="form-group">
                                <label class="label" for="image">Image</label>
                                <input type="file" id="image" class="form-control" name="image"
                                       value="">
                                <span
                                    class="badge text text-danger"> {{$errors->has('image') ? $errors->first('image'):''}} </span>

                            </div>


                            <div class="form-group">
                                <input class="filled-in" type="checkbox" id="status" name="status"
                                       value="1" {{$post->status ==true ? 'checked':''}}>
                                <label for="status">Publish</label>
                            </div>

                        </div>
                    </div>
                </div>

                <!--Category an Tag Part-->
                <div class="col-md-4">
                    <div class="card mt-2">

                        <div class="card-header text-center">Select Categories & Tags</div>

                        <div class="card-body">

                            <div class="form-group">
                                <label class="label" for="title">Select Category</label>
                                <select class="form-control" name="category_id">


                                    @if($post->category_id)
                                        <option value="{{$post->category->id}}">{{$post->category->name}}</option>
                                    @endif

                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>

                                <span
                                    class="badge text text-danger"> {{$errors->has('category_id') ? $errors->first('category_id'):''}} </span>

                            </div>


                            <div class="form-group">
                                <label class="label" for="title">Select Tags</label>

                                <select class="form-control select2-multi" name="tags[]" multiple>


                                    @foreach($tags as $tag)


                                        <option
                                            @foreach($post->tags as $postTag)
                                            {{$postTag->id == $tag->id ? 'selected':''}}
                                            @endforeach

                                            value="{{ $tag->id }}">

                                            {{ $tag->name }}

                                        </option>
                                    @endforeach

                                </select>

                                <span
                                    class="badge text text-danger"> {{$errors->has('tags') ? $errors->first('tags'):''}} </span>

                            </div>


                        </div>
                        <div class="text-center btn-group mb-2" style="margin-left: 5px; margin-right: 5px" >
                            <button type="submit" class="btn btn-primary   btn-block">Update</button>
                            <a class="btn btn-danger " href="{{ route('post.index') }}">BACK</a>

                        </div>



                    </div>
                </div>

            </div>


            <!--Add Post Body-->
            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <div class="card-header text-center">Post Details!</div>

                        <div class="card-body">
                            <textarea class="form-control" name="body" rows="8">{{$post->body}}</textarea>

                            <span
                                class="badge text text-danger"> {{$errors->has('body') ? $errors->first('body'):''}} </span>

                        </div>

                    </div>

                </div>
            </div>

        </form>

    </div>
@endsection


@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>


    <script>
        $('.select2-multi').select2();
    </script>

@endsection
