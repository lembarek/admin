@inject('userRepo', 'Lembarek\Auth\Repositories\UserRepositoryInterface')

{!! $userRepo->model()->paginate(config('admin.paginate'))->links() !!}

@foreach($userRepo->model()->paginate(config('admin.paginate')) as $user)
    <h1>{{ $user['username'] }}</h1>
@endforeach

