{{-- Si une erreur existe --}}
@if(count($errors) > 0)

    <ul>
        {{-- Pour chaque erreurs on l'affiche --}}
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    
@endif    
