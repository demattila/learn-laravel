@extends('layout')


@section('content')
    <h1>Posts </h1>

    <table>
        <div>
        @foreach($posts as $post)
            <tr><td>{{$post->name}}</td></tr>
            <tr><td>{{$post->description}}</td></tr>
            <tr><td>{{$post->created_at}}</td></tr>
        @endforeach
        </div>
    </table>

@endsection