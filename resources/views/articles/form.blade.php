	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class'=>'form-control', 'foo' =>'bar']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('body', 'Body:') !!}
		{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('published_at', 'Published On:') !!}
		{!! Form::input('date', 'published_at', date('Y-m-d'), ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('tags', 'Tags:') !!}
		{!! Form::select('tags[]', $tags, null, ['class' => 'form-control', 'multiple']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit($submitButton, ['class'=>'btn btn-primary form-control']) !!}
	</div>
