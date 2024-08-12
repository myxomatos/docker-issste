@extends('layout.home')

@section('content')

        <div style="margin: auto; width: 50%; padding: 15vh;">
            
                <p class="color_1" style="font-size: 40px;">¡El paciente no fue agregado debido a que ya existe en la Base de Datos!</p>
                <p class="color_7" style="font-size: 30px;">Revisa los datos y vuelve a intentarlo.</p>
                <a style="text-decoration: none;" href="{{ route('indexCensos') }}">
                    <span class="button_back" style="padding: 6px 38px 6px 38px;">
                        Continuar
                    </span>
                </a>
            
        </div>
 


@endsection