<ul class="nav nav-sidebar" id="sidebar">
    @foreach(config('admin.links') as $li)
        <li><a  onlick="setActiveClass()" href="{{ $li[0] }}">{{ $li[1] }}</a></li>
    @endforeach
</ul>

<script>
function setActiveClass(){
    console.log('active');
}
</script>
