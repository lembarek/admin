@extends('admin::layout.master')

@section('title')

@stop

@section('content')
<h1>{{ $user->username }}</h1>
@foreach($user->roles as $role)
    <h2>{{ $role->name }}</h2>
@endforeach

<button>{{ trans('core::general.delete') }}</button>
@stop

