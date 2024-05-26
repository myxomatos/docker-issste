@extends('layout.home')

@section('content')

    <div class="uk-padding">
        @if(count($actividades) === 0)

        <a href="{{ route('verHospital', [$enlace->hospital_id]) }}">
                        <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                            Volver
                        </button>
         </a>
        <h2 style="margin-top: 3vh;" class="color_1">No hay actividades creadas durante el mes por {{$enlace->name}} {{$enlace->apellido}}</h2>
        @else
        <a href="{{ route('verHospital', [$enlace->hospital_id]) }}">
                        <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                            Volver
                        </button>
         </a>
        <h2 style="margin-top: 3vh;" class="color_7">Actividades del mes de {{$enlace->name}} {{$enlace->apellido}}</h2>
        <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Creada</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Subactividad</th>
                    <th>Notas</th>
                </tr>
                </thead>
                <tbody>
                    
                    @foreach($actividades as $key => $actividad)
                    <tr @if ($key === 0) @endif>
                        <td class="textTransform">
                            {{$key+1}}
                        </td>
                        <td class="textTransform">
                            {{ $actividad->created_at }}
                        </td>
                        <td class="textTransform">
                            {{ $actividad->nombre }}
                        </td>
                        <td class="textTransform">
                            {{ $actividad->descripcion_actividad }}
                        </td>
                        <td class="textTransform">
                            {{ $actividad->descripcion_subactividad }}
                        </td>
                        <td class="textTransform">
                            {{ $actividad->notas }}
                        </td>
                        
                    </tr>
                    @endforeach
                    
                    
                </tbody>  
        </table>
        @endif
    </div>



@endsection