@inject('blogRepo', 'Lembarek\Blog\Repositories\BlogRepositoryInterface')

@foreach($blogRepo->all() as $blog)

    <h2>{{ $blog['title'] }}</h2>

@endforeach
