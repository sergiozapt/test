@extends('app')

@section('content')
<h1>{{ $article->title }} </h1>

<a href="{{ action('ArticlesController@edit', $article->id) }}">Edit</a>
	<article>
	{{ $article->body}}
	</article>

@stop
