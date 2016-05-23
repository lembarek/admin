@inject('blogRepo', 'Lembarek\Blog\Repositories\BlogRepositoryInterface')

{!! $blogRepo->model()->paginate(config('admin.paginate'))->links() !!}

@foreach($blogRepo->model()->paginate(config('admin.paginate')) as $blog)

    <h2>{{ $blog['title'] }}</h2>

@endforeach
