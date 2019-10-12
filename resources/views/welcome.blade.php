@extends('layout')


@section('content')
    <h1>Welcome Page! Laracast </h1>

    <div>
        <ul>
            @foreach($tasks as $task)
                <li>{{$task}}</li><br>
            @endforeach
        </ul>
    </div>
@endsection