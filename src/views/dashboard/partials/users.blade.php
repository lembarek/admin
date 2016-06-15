@inject('userRepo', 'Lembarek\Auth\Repositories\UserRepositoryInterface')

<?php $users = $userRepo->model()->with('roles')->paginate(config('admin.paginate')) ?>

{!! $users->links() !!}

<a
    href="{{route('admin::create-user')}}"
    class="btn btn-primary pull-right"
>
    {{trans('admin::dashboard.create-user')}}
</a>
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
        <td><a href="{{ route('admin::profile', ['username' => $user['username']]) }}">{{ $user['username'] }}</a></td>
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

