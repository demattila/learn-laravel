@extends('layouts.app')

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        <div class="col-sm-6">
            <h3>Post List</h3>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('posts.create') }}" class="btn btn-success mb-2">Add Post</a>
        </div>
    </div>
{{----}}
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered" id="laravel_crud">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th colspan="2" class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            <a href="{{route('posts.show',$post)}}"> {{ $post->name }} </a>
                        </td>
                        <td>{{ $post->description }}</td>
                        <td>{{ date('Y-m-d', strtotime($post->created_at)) }}</td>
                        <td class="text-center">
                            <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a></td>
                        <td class="text-center">
                            <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if(count($posts) < 1)
                    <tr>
                        <td colspan="10" class="text-center">There are no posts available yet!</td>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>


    {{--<div>--}}
        {{--@foreach($posts as $post)--}}
            {{--<table class="border">--}}
                {{--<tr><td> <strong>{{$post->name}}</strong> </td></tr>--}}
                {{--<tr><td>{{$post->id}}</td></tr>--}}
                {{--<tr><td>{{$post->description}}</td></tr>--}}
                {{--<tr><td>{{$post->created_at}}</td></tr>--}}
            {{--</table>--}}
        {{--@endforeach--}}
    {{--</div>--}}

@endsection