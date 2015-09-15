@extends('app')

@section('content')

    @include('errors.list')

{!! Form::open(['url'=>'auth/register']) !!}

    {!! csrf_field() !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::email('name', old('name'), ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', old('email'), ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirm Password:') !!}
        {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit("Register", ['class'=>'btn btn-primary form-control']) !!}
    </div>
{!! Form::close() !!}

@stop