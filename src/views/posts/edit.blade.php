@extends('admin::layout.master')

@section('content')
<form action="{{ route('admin::dashboard.posts.update', ['id' => $post->id]) }}" method="post">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-4 control-label">{{ trans('admin::posts.title')}}</label>
        <div class="col-md-6">
        <input type="text" class="form-control" name="title" value="{{ $post['title'] }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">{{ trans('admin::posts.description')}}</label>
        <div class="col-md-6">
            <textarea class="form-control" name="description"> {{ $post['description'] }}</textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">{{ trans('admin::posts.body')}}</label>
        <div class="col-md-6">
            <textarea class="form-control" name="body">{{ $post['body'] }}</textarea>
        </div>
    </div>

    <div class="col-md-9 ">
        <button type="submit" class="btn btn-primary pull-right">{{ trans('admin::posts.update') }}</button>
    </div>
</form>
@stop
