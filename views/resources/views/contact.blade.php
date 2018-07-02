@extends('layouts/app')

@section('content')
    <h1>CONTACT</h1>


    @if(!empty($prenom))

        <h2>Je m'appelle {{$prenom}}.</h2>

        @else 

            <h2>Je m'appelle pas.</h2>

    @endif

    <h2>J'aime boire : </h2>
    @foreach ($boissons as $boisson)

        <ul>
            <li> {{$boisson}} </li>
        </ul>

    @endforeach
@stop