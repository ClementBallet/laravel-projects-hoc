@extends('layouts.app')

@section('content')

    <h1>Edit post</h1>

    {{-- <form action="{{ route('posts.update', $Post->id) }}" method="post" style="display: grid;">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <br>
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" value="{{ $Post->title }}">
        <br>
        <label for="content">Contenu</label>
        <textarea name="content" id="content" cols="100" rows="10">{{ $Post->content }}</textarea>
        <br>
        <label for="is-active">Visibilité du post</label>
        <select name="is-active" id="is-active">
            <option value="0">Non actif</option>
            <option value="1">Actif</option>
        </select>
        <br>
        <input type="submit" value="Mettre à jour">
        <br>
    </form>

    <form action="{{ route('posts.destroy', $Post->id) }}" method="post" style="display: grid;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="submit" value="Supprimer le post">
    </form> --}}

    {!! Form::model($Post, ['method' => "PATCH", "action" => ["PostController@update", $Post->id]]) !!}
        {!! Form::label('title', 'Titre'); !!}
        {!! Form::text('title',null) !!}

        {!! Form::label('content', 'Contenu'); !!}
        {!! Form::textarea('content',null) !!}

        {!! Form::label('is-active', 'Is active ?'); !!}
        {!! Form::select('is-active', ["0" => "Unactive","1" => "Active"], null) !!}

        {!! Form::submit('Mettre à jour le post') !!}
    {!! Form::close() !!}

    {!! Form::open(['method' => "DELETE", "action" => ["PostController@destroy", $Post->id]]) !!}
        {!! Form::submit('Supprimer le post') !!}
    {!! Form::close() !!}

@stop