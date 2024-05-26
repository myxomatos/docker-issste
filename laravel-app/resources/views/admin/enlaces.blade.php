@extends('layout.home')

@section('content')
    <div class="uk-padding">
        <a href="{{ route('homeIndexPanel') }}">
                        <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                            Volver
                        </button>
                    </a>
        <h2 class="color_7">
            Enlaces
        </h2>
        <table class="uk-table uk-table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Turno</th>
                <th>Hora de entrada</th>
                <th>Hora de salida</th>
                <th>Subcoordinador</th>
                @if(Auth::User()->rol === 'coordinador')
                    <th>Acciones</th>
                    <th></th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($enlaces as $enlace)
                <tr>
                    <td>
                        {{ $enlace->nombre }} {{ $enlace->apellido }}
                    </td>
                    <td>
                        {{ $enlace->turno }}
                    </td>
                    <td>
                        {{ $enlace->entrada }}
                    </td>
                    
                    
                    <td>

                     @if($enlace->check_in === 1)
                           En turno
                        @else
                            {{ $enlace->salida }}
                         @endif


                    </td>
                    <td>
                        {{ $enlace->subcoordinador }}
                    </td>
                    @if(Auth::User()->rol === 'coordinador')
                        <td>
                            <a href="{{ route('editEnlace',[$enlace->idEnlace]) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('deleteEnlace',[$enlace->idEnlace]) }}">
                                
                                    <span style="color: red;" class="uk-margin-small-right" style="font-size: 16px" uk-icon="icon: trash"></span>
                                
                                
                            </a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>

        </table>
        @endsection
    </div>


