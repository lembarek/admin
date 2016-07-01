@extends('admin::layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('admin::posts.create') }}</div>
                    <div class="panel-body">
                        @include('core::partials.errors')
                        <form class="form-horizontal" role="form" method="POST" action="{{route('admin::dashboard.posts.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('admin::posts.title') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('admin::posts.description') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('admin::posts.text')}}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="body">{{ old('body') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('published_at')}}</label>
                                <div class="col-md-6">
                                <input type="date" class="form-control" name="published_at" value="{{ old('published_at') }}">
                                </div>
                            </div>


                        <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('admin::posts.create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
