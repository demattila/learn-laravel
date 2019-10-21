@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-sm-6">
                <h3>Add Product</h3>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('posts.index') }}" class="btn btn-danger mb-2">Go Back</a>
            </div>
        </div>
        <hr />

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf

            <div class="form-group">
                <strong>Post Title</strong>
                <input class='form-control' type="text" name="name">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>

            <div class="form-group">
                <strong>Task Description</strong>
                <input class="form-control" type="text" name="description">
                <span class="text-danger">{{ $errors->first('description') }}</span>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" >Create Post</button>
            </div>
        </form>
@endsection