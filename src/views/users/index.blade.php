@extends('admin::layout.master')

@section('content')
 {!! $users->links() !!}

@can('create-users')
<a
    href="{{route('admin::dashboard.users.create')}}"
    class="btn btn-primary pull-right"
>
    {{trans('admin::dashboard.create-user')}}
</a>
@endcan
<table class="table">
    <thead>
    <tr>
        <th>{{ trans('admin::dashboard.username') }}</th>
        <th>{{ trans('admin::dashboard.role') }}</th>
    </tr>
    </thead>
    @foreach($users as $user)
    <tbody>
    <tr>
        @can('read-users')
        <td><a href="{{ route('admin::dashboard.users.show', ['username' => $user['username']]) }}">{{ $user['username'] }}</a></td>
        @else
        <td>{{ $user['username'] }}</td>
        @endcan
        <td>
            @foreach($user->roles as $role)
                {{ $role->name }}
            @endforeach
        </td>
    </tr>
    </tbody>
    @endforeach
</table>

{!! $users->links() !!}

@stop

