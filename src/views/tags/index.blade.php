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
            <th class="hidden-sm">{{ trans('blog::tag.subtitle') }}</th>
            <th class="hidden-md">{{ trans('blog::tag.page_image') }}</th>
            <th class="hidden-md">{{ trans('blog::tag.mega_description') }}</th>
            <th class="hidden-md">{{ trans('blog::tag.layout') }}</th>
            <th class="hidden-sm">{{ trans('blog::tag.direction') }}</th>
            <th>{{ trans('admin::tag.action') }}</th>
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
              <td>
                  <a href="{{ route('admin::dashboard.tags.edit', ['tags' => $tag->id]) }}">
                      <span class="glyphicon glyphicon-pencil" ></span>
                  </a>
                  @include('admin::tags.partials.delete')
              </td>
            </tr>
        @endforeach
    </tbody>
</table>

{!! $tags->links() !!}
@stop
