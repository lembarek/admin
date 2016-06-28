@extends('admin::layout.master')

@section('content')


<a
    href="{{route('admin::dashboard.tags.create')}}"
    class="btn btn-primary pull-right"
>
    {{trans('blog::tag.new_tag')}}
</a>

    {!! $tags->appends(['orderby' => $orderby, 'direction' => $direction])->links() !!}

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <a
                    href="{{ routeWithOrderBy('admin::dashboard.tags.index', 'name', $direction) }}">
                    {{ trans('blog::tag.name') }}
                </a>
            </th>
            <th>
                <a
                    href="{{ routeWithOrderBy('admin::dashboard.tags.index', 'title', $direction) }}">
                    {{ trans('blog::tag.title') }}
                </a>
            </th>
            <th class="hidden-sm">
                <a
                    href="{{ routeWithOrderBy('admin::dashboard.tags.index', 'subtitle', $direction) }}">
                    {{ trans('blog::tag.subtitle') }}
                </a>
            </th>
            <th class="hidden-md">
                <a
                    href="{{ routeWithOrderBy('admin::dashboard.tags.index', 'page_image', $direction) }}">
                    {{ trans('blog::tag.page_image') }}
                </a>
            </th>
            <th class="hidden-md">
                <a
                    href="{{ routeWithOrderBy('admin::dashboard.tags.index', 'meta_description', $direction) }}">
                    {{ trans('blog::tag.mega_description') }}
                </a>
            </th>
            <th class="hidden-md">
                <a
                    href="{{ routeWithOrderBy('admin::dashboard.tags.index', 'layout', $direction) }}">
                    {{ trans('blog::tag.layout') }}
                </a>
            </th>
            <th class="hidden-sm">
                <a
                    href="{{ routeWithOrderBy('admin::dashboard.tags.index', 'direction', $direction) }}">
                    {{ trans('blog::tag.direction') }}
                </a>
            </th>
            <th><a href="route('admin::dashboard.tags.index')">
                <a
                    {{ trans('admin::tag.action') }}
                </a>
            </th>
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

    {!! $tags->appends(['orderby' => $orderby, 'direction' => $direction])->links() !!}
@stop
