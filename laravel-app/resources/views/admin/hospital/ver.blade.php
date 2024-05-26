@extends('layout.home')

@section('content')

    <div class="uk-padding">
        
        <a href="{{ route('hospitalesIndex') }}">
                        <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                            Volver
                        </button>
         </a>
        
            
            <div class="uk-text-center" style="margin-top: 8vh;">
                <h2>
                    {{ $hospital->nombre }}
                </h2>

            </div>
        <h2 style="margin-top: 8vh;" class="color_7">Subcoordinadores</h2>
        <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                </tr>
                </thead>
                <tbody>
                
                    <tr>
                        <td class="textTransform">
                            {{ $sub->name }} {{ $sub->apellido }}
                        </td>
                    </tr>

                
                </tbody>

        </table>
        <h2 style="margin-top: 3vh;" class="color_7">Enlaces</h2>
        <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Turno</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                    
                    @foreach($enlaces as $enlace)
                        <tr>
                            <td class="textTransform">
                                {{ $enlace->name }} {{ $enlace->apellido }}
                            </td>
                            <td class="textTransform">
                                {{ $enlace->turno }}
                            </td>
                            <td class="textTransform">
                                <a href="{{ route('hospEnlaceActividades',[$enlace->id]) }}">
                                    Ver Actividades
                                </a>
                            </tr>
                    @endforeach  
                    
                    
                </tbody>

        </table>

    </div>



@endsection



