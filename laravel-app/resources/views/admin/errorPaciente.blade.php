@extends('layout.home')

@section('content')

        <div style="margin: auto; width: 50%; padding: 8vh;">
            
                <p class="color_1" style="font-size: 40px;">¡El paciente no fue agregado debido a que ya existe en la Base de Datos!</p>
                <p class="color_7" style="font-size: 30px;">Ésto fué lo que encontré:</p>
                @foreach($datos as $d)
                <div class="uk-panel uk-panel-box" style="background-color: transparent;">
                    <h2 class="uk-panel-title" style="margin: 10px 10px; font-size: 2.4vh;" class="color_1">Paciente:</h2>
                    <ul class="uk-nav uk-nav-side" style="font-size: 1.4vh; background-color: #be335a; margin: 10px 10px; padding: 16px;">
                        <li>
                            <h3 class="uk-panel-title" style="color: #c8c8c8; margin: 10px 14px; font-size: 1.8vh;">Nombre: <span style="text-transform: capitalize; color: #ffffff;">{{ $d->apellidos }} {{ $d->nombre }}</span></h3>        
                        </li>
                        <li>
                            <h3 class="uk-panel-title" style="color: #c8c8c8; margin: 10px 14px; font-size: 1.8vh;">Genero: <span style="text-transform: capitalize; color: #ffffff;">{{ $d->genero }}</span></h3>        
                        </li>
                        <li>
                            <h3 class="uk-panel-title" style="color: #c8c8c8; margin: 10px 14px; font-size: 1.8vh;">RFC: <span style="text-transform: capitalize; color: #ffffff;">{{ $d->rfc }}</span></h3>        
                        </li>
                        <li>
                            <h3 class="uk-panel-title" style="color: #c8c8c8; margin: 10px 14px; font-size: 1.8vh;">Tipo de Derechohabiente: <span style="text-transform: capitalize; color: #ffffff;">{{ $d->tipo_derechohabiente }}</span></h3>        
                        </li>
                    
                    </ul>
                </div>
                @endforeach

                <p class="color_1" style="font-size: 20px;">¿Quieres reingresar al Paciente?</p>

                <a style="text-decoration: none;" href="{{ route('indexCensos') }}">
                    <span class="button_back" style="padding: 6px 34px 6px 34px; margin: 4px;">
                        Cancelar
                    </span>
                </a>
                <a style="text-decoration: none;" href="{{ route('reingreso', [$d->id]) }}"">
                    <span class="button_confirm" style="padding: 6px 34px 6px 34px; margin: 4px;">
                        Reingresar
                    </span>
                </a>
            
        </div>
 


@endsection