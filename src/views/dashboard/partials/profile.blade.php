@extends('admin::layout.master')

@section('title')

@stop

@section('content')
<h1>{{ $user->username }}</h1>
<h2>{{ $user->roles[0]->name }}</h2>
@stop

