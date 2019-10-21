@extends('layouts.app')

@section('title')
    About Us
@endsection

@section('content')
    <div class="container">
        <h1>About us</h1>
        <h2>I got an id parameter: {{$id}} </h2>

        <div>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores atque consectetur dicta,
                dolorem dolores ea, eos illo inventore maxime nemo placeat repudiandae velit vero vitae voluptas?
                Atque dolores ducimus reprehenderit!</p>
        </div>
    </div>

@endsection