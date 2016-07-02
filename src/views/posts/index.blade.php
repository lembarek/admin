@extends('admin::layout.master')

@section('content')

<a
    href="{{route('admin::dashboard.posts.create')}}"
    class="btn btn-primary pull-right"
>
    {{trans('admin::posts.new_post')}}
</a>

<ul>
@foreach($posts as $post)
<li>
    <a href="{{route('admin::dashboard.posts.edit', ['id' => $post->id])}}">{{ $post['title'] }}</a>
</li>
@endforeach

</ul>
@stop

