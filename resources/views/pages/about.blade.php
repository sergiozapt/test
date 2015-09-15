@extends('app')

@section('content')


    <h1>About Pipeline</h1>

    @if (count($people))
        <h3> People I Like </h3>
    <ul>
        @foreach ($people as $person)
            <li>{{$person}}</li>
        @endforeach
    </ul>
    @endif

    <p>Everything we do is connected with volume: dogma, sainthood, moonlight, life.</p>

@stop
