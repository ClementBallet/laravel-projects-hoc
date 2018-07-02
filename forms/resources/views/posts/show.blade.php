@extends('layouts.app')

@section('content')

    <h1>{{ $Post->title }}</h1>

    <p>{{ $Post->content }}</p>

    <p>
        <a href="{{ route('posts.edit', $Post->id) }}">Modifier</a>
    </p>

@stop

