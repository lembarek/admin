@extends('admin::layout.master')

@section('content')


<a
    href="{{route('admin::dashboard.tags.create')}}"
    class="btn btn-primary pull-right"
>
    {{trans('blog::tag.new_tag')}}
</a>

{!! $tags->links() !!}

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>{{ trans('blog::tag.name') }}</th>
            <th>{{ trans('blog::tag.title') }}</th>
            <th>{{ trans('blog::tag.subtitle') }}</th>
            <th>{{ trans('blog::tag.page_image') }}</th>
            <th>{{ trans('blog::tag.mega_description') }}</th>
            <th>{{ trans('blog::tag.layout') }}</th>
            <th>{{ trans('blog::tag.direction') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tags as $tag)
            <tr>
              <td>{{ $tag->name}}</td>
              <td>{{ $tag->title }}</td>
              <td class="hidden-sm">{{ $tag->subtitle }}</td>
              <td class="hidden-md">{{ $tag->page_image }}</td>
              <td class="hidden-md">{{ $tag->meta_description }}</td>
              <td class="hidden-md">{{ $tag->layout }}</td>
              <td class="hidden-sm">
                @if ($tag->reverse_direction)
                  Reverse
                @else
                  Normal
                @endif
              </td>
            </tr>
        @endforeach
    </tbody>
</table>

{!! $tags->links() !!}
@stop
