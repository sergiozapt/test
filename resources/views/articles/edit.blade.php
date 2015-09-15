@extends('app')

@section('content')

<h1>Edit Article: {{ $article->title }} </h1>

<hr />

{!! Form::model($article,['method'=>'PATCH', 'action'=>['ArticlesController@update', $article->id]]) !!}

	@include('articles.form', ['submitButton'=>'Edit Article'])

{!! Form::close() !!}

	@include('errors.list')

@stop
