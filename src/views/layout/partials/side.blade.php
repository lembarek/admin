<ul class="nav nav-sidebar">
    @foreach(config('admin.links') as $li)
        <li><a  href="{{ $li[0] }}">{{ $li[1] }}</a></li>
    @endforeach
</ul>
