@extends('admin::layout.master')

@section('title')

@stop

@section('content')
<h1>{{ $user->username }}</h1>

@if(count($user->roles))
    @foreach($user->roles as $role)
        <h2>{{ $role->name }}</h2>
    @endforeach
@endif

@if(count(auth()->user()->getRolesFor($user)))
    <form action="{{ route('admin::add-role') }}" method="post">
         {{ csrf_field() }}
        <select name="role" >
            @foreach(auth()->user()->getRolesFor($user) as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
        <input type="hidden" name="user" value="{{$user->id}}">
        <input type="submit" value="{{ trans('core::general.add') }}">
    </form>
@endif

@can('destory-user', $user)
    <form action="{{ route('admin::delete-user', ['username' => $user->username]) }}" method="post">

         {{ csrf_field() }}

         {{ method_field('DELETE') }}

        <button>{{ trans('core::general.delete') }}</button>
    </form>
@endcan

@stop

