@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3>Edit Post</h3>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('posts.index') }}" class="btn btn-danger mb-2">Go Back</a>
        </div>
    </div>
    <hr />

    <form action="{{route('posts.update',$post)}}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <strong>Title</strong>
            <input type="text" class="form-control" name="name" value="{{ $post->name }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>

        <div class="form-group">
            <strong>Description</strong>
            <textarea class="form-control" name="description" >{{ $post->description }}</textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>

        <div class="control">
            <button type="submit" class="btn btn-primary" >Update Post</button>
        </div>


    </form>


@endsection