@extends('layouts.app')

@section('content')
<div >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Home Page!</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br>
                    <a href="{{route('posts.index')}}">Click here</a> to see the Posts!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
