@component('mail::message')

# New Post: {{($post->name)}}

{{$post->description}}
{{--'url' => '/posts/'.$post->id--}}
@component('mail::button', [])
    View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
