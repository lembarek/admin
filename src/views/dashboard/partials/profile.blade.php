@extends('admin::layout.master')

@section('title')

@stop

@section('content')
<h1>{{ $user->username }}</h1>
@foreach($user->roles as $role)
    <h2>{{ $role->name }}</h2>
@endforeach


@can('destory-user', $user)
    <form action="{{ route('admin::delete-user', ['username' => $user->username]) }}" method="post">

         {{ csrf_field() }}

         {{ method_field('DELETE') }}

        <button>{{ trans('core::general.delete') }}</button>
    </form>
@endcan

@stop

