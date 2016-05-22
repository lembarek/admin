@inject('userRepo', 'Lembarek\Auth\Repositories\UserRepositoryInterface')

{!! $userRepo->model()->paginate(22)->links() !!}

@foreach($userRepo->model()->paginate(22) as $user)
    <h1>{{ $user['username'] }}</h1>
@endforeach

