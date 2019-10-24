@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-sm-6">
            <h3>{{$post->name}}</h3>
        </div>

        <div class="col-sm-6 text-right">
            <a href="{{ route('posts.index') }}" class="btn btn-danger mb-2">Go Back</a>
        </div>
    </div>

    <div class="content">
        {{$post->description}}
    </div>
    <hr>

    <div>
        <h3>Tasks</h3>
    </div>


    @if( $post->tasks->count() )
        <div class="box">
            @foreach($post->tasks as $task)
                <div>
                    <form action="{{route('tasks.update', $task->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <label class="checkbox {{$task->completed ? 'is-complete' : ''}}" for="completed" >
                            <input type="checkbox" name="completed" onchange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                            {{$task->description}}
                        </label>
                    </form>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Add a new task form -->
    <form method="POST" action="{{route('tasks.store',$post)}}">
        @csrf
        <div class="form-group">
            <label class="label" for="description">New task</label>

            <div class="control">
                <input type="text" class="input" name="description">
            </div>
        </div>

        <div class="form-group">
            <div class="control">
                <button type="submit" class="btn btn-primary"> Add Task</button>
            </div>
        </div>
        @include('errors')

    </form>
@endsection