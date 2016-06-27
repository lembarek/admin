@extends('admin::layout.master')

@section('content')
<form action="{{ route('admin::dashboard.tags.store') }}" method="post" class="form">
{{ csrf_field() }}
<input
    type="text"
    class="form-control"
    name="name"
    placeholder={{ trans('core::general.name')}}
    value="{{ old('name') }}"
>
<input
    type="text"
    class="form-control"
    name="title"
    placeholder={{ trans('core::general.title')}}
    value="{{ old('title') }}"
>
<input
    type="text"
    class="form-control"
    name="subtitle"
    placeholder={{ trans('core::general.subtitle')}}
    value="{{ old('subtitle') }}"
>
<input
    type="text"
    class="form-control"
    name="page_image"
    placeholder={{ trans('core::general.page_image')}}
    value="{{ old('page_image') }}"
>
<input
    type="text"
    class="form-control"
    name="meta_description"
    placeholder={{ trans('core::general.meta_description')}}
    value="{{ old('meta_description') }}"
>
<input
    type="text"
    class="form-control"
    name="layout"
    placeholder={{ trans('core::general.layout')}}
    value="{{ old('layout') }}"
>
<label for="direction">{{ trans('admin::tag.normal') }}</label>
<input
    type="radio"
    name="direction"
    value="1"
>
<label for="direction">{{ trans('admin::tag.reverse') }}</label>
<input
    type="radio"
    name="direction"
    value="0"
>

<button
    class="btn btn-lg btn-primary btn-block"
    type="submit">{{ trans('blog::tag.new_tag') }}
</button>

</form>
@stop
