@extends('admin::layout.master')

@inject('schema', 'Lembarek\Core\Schema\Schema')

@section('content')

        <div class="col-md-6 col-md-push-2">
        <h1>{{ $user->username }} </h1>
        <form action="{{ route('admin::dashboard.users.update', ['username' => $user->username]) }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            @foreach($user->profile->toArray() as $key => $value)
            <div class="form-group">
                <div class="row">
                    <label for="" class="col-md-4 control-label">{{ $key }}</label>
                    <div class="col-md-4">
                    @include('profile::edit.partials.'.$schema->get_column_type('profiles', $key),
                    ['name' => $key, 'className'=> 'form-control', 'value' => $value])
                    </div>
                </div>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary pull-right">{{ trans('admin::users.update') }}</button>
       </form>
        </div>
@stop
