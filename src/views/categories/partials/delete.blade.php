<form method="post" action="{{ route('admin::dashboard.categories.destroy', ['categories' => $category->id]) }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {!! method_field('delete') !!}
    <button class="submit-fa"><span class="glyphicon glyphicon-remove"></span></button>
</form>

