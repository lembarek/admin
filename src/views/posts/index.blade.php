@extends('admin::layout.master')

@section('content')

<ul>
@foreach($posts as $post)
<li>
    <a href="{{route('admin::dashboard.posts.edit', ['id' => $post->id])}}">{{ $post['title'] }}</a>
</li>
@endforeach

</ul>
@stop

