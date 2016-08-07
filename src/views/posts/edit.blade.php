@extends('admin::layout.master')

@section('content')
@can('edit-posts')
<div class="col-md-9">

<form action="{{ route('admin::dashboard.posts.update', ['id' => $post->id]) }}" method="post">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <div class="col-md-9">
        <input type="text" class="form-control" name="title" value="{{ $post['title'] }}">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9">
            <textarea rows=10 class="form-control" name="description"> {{ $post['description'] }}</textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-9">
            <textarea rows=20  class="form-control" name="body">{{ $post['body'] }}</textarea>
        </div>
    </div>

     <div class="col-md-9 ">
        <button type="submit" class="btn btn-primary pull-right">{{ trans('admin::posts.update') }}</button>
    </div>
</form>

</div>

<div class="col-md-3">
<div class="btn-group">

@can('destroy-posts')
<form action="{{ route('admin::dashboard.posts.destroy', ['id' => $post->id]) }}" method="post">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-danger">{{ trans('admin::posts.delete') }}</button>
</form>
@endif

<form action="{{ route('admin::dashboard.posts.update', ['id' => $post->id]) }}" method="post">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" value="{{ ! $post['active'] }}" name="active">
    <button type="submit" class="btn btn-primary">{{ $post['active'] ? trans('admin::posts.suspend'): trans('admin::posts.publish') }}</button>
</form>

<a href="{{ route('admin::dashboard.posts.show', ['slug' => $post->slug])  }}" class="btn btn-warning">{{ trans('admin::posts.preview') }}</a>
</div>

@include('admin::posts.partials.categories')
</div>
@else
    <p>{{ trans('admin::can_not_update_posts') }}</p>
@endcan

@stop
