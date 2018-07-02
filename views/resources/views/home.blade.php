@extends ('layouts/app')

@section ('content')

<h1>Infos:</h1>

@foreach ($arrays as $key => $value)

   {{ $key }}. Je m'appelle {{ $value[0] }} et j'ai {{ $value[1] }} ans.<br>

@endforeach

@stop