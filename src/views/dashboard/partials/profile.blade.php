@extends('admin::layout.master')

@section('title')

@stop

@section('content')
<h1>{{ $user->username }}</h1>

@if(count($user->roles))
    @foreach($user->roles as $role)
    <form action="{{ route('admin::delete-role', ['role' => $role->id])}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="user" value="{{$user->id}}">
            <h4>
                {{ $role->name }}
                <input type="submit"  value="X">
            </h4>
        </form>
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

