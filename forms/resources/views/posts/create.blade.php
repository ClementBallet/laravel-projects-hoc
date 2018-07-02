@extends('layouts.app')

@section('content')



    <h1>Create post</h1>

    {{-- Autre possibilité pour l'attribut action : route('posts.store') --}}
    {{-- <form action="{{ action('PostController@store') }}" method="POST" style="display: grid;">
        <input type="hidden" name="_method" value="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <br>
        <label for="title">Titre</label>
        <input type="text" name="title" id="title">
        <br>
        <label for="content">Contenu</label>
        <textarea name="content" id="content" cols="100" rows="10"></textarea>
        <br>
        <label for="is-active">Visibilité du post</label>
        <select name="is-active" id="is-active">
            <option value="0">Non actif</option>
            <option value="1">Actif</option>
        </select>
        <br>
        <input type="submit" value="Créer le post">
    </form> --}}

    {!! Form::open(['action' => ['PostController@store']]) !!}
        {!! Form::label('title', 'Titre'); !!}
        {!! Form::text('title',null) !!}

        {!! Form::label('content', 'Contenu'); !!}
        {!! Form::textarea('content',null) !!}

        {!! Form::label('is-active', 'Is active ?'); !!}
        {!! Form::select('is-active', ["0" => "Unactive","1" => "Active"], null) !!}

        {!! Form::submit('Créer le post') !!}
    {!! Form::close() !!}

    @include('includes.errors')
@stop