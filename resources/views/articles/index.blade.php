@extends('app')

@section('content')
<h1>{{ $pageTitle }}</h1>

	@foreach ($articles as $article)
		<article>
			<div class="bs-callout bs-callout-default" id="callout-type-b-i-elems">
				@if (auth()->check())
					@if (!$article->trashed())
						{!! Form::model($article,['method'=>'DELETE', 'action'=>['ArticlesController@destroy', $article->id]]) !!}
						<button type="submit" class="close" style="color:grey; opacity: 0.7" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					@else
						{!! Form::model($article,['method'=>'PATCH', 'action'=>['ArticlesController@restore', $article->id]]) !!}
						<button type="submit" class="close" style="color:red; opacity: 1.0" aria-label="Close">
							<span aria-hidden="true">Restore</span>
						</button>
					@endif
					{!! Form::close() !!}
				@endif
			
				<h4> 
					<a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>
				</h4>
			<p>{{ $article->body }}</p>
			<p>-{{ $article->user->name }}</p>
			
			 </div>
		</article>

	@endforeach

@stop
