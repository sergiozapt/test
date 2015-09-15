@extends('app')

@section('content')

@include('errors.list')

{!! Form::open(['url'=>'auth/login']) !!}

    {!! csrf_field() !!}

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', old('email'), ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <div class="checkbox">
        <label>
            {!! Form::checkbox('remember') !!} Remember Me
        </label>
    </div>

    <div class="form-group">
        {!! Form::submit("Login", ['class'=>'btn btn-primary form-control']) !!}
    </div>
{!! Form::close() !!}


@stop