@extends('layout.home')

@section('content')

        <div style="margin: auto; width: 50%; padding: 15vh;">
            
                <p class="color_7" style="font-size: 40px;">¡Paciente Reingresado!</p>
                <a style="text-decoration: none;" href="{{ route('editCenso',[$id]) }}">
                    <span class="button_back" style="padding: 6px 38px 6px 38px;">
                        Editar Paciente
                    </span>
                </a>
            
        </div>
 


@endsection