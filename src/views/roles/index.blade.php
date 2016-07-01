@extends('admin::layout.master')

@section('content')
<a
    href="{{route('admin::dashboard.roles.create')}}"
    class="btn btn-primary pull-right"
>
    {{trans('admin::role.new_role')}}
</a>

<table class="table">
    <thead>
        <tr>
            <th>{{ trans('admin::role.name') }}</th>
            <th>{{ trans('admin::role.order') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->order}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    @stop
