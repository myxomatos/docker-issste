@extends('layout.home')

@section('content')
    <div class="uk-padding">
    <a href="{{ route('homeIndexPanel') }}">
                        <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                            Volver
                        </button>
                    </a>
        <h2 class="color_7">
            Hospitales
        </h2>
    @if(Auth::User()->rol === 'coordinador')
            <div class="uk-text-center">
                <a href="{{ route('createHospital') }}">
                    <button class="button_back">Agregar</button>
                </a>
            </div>
     @endif
            <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Status</th>
                    @if(Auth::User()->rol === 'coordinador')
                    <th>Acciones</th>
                    <th></th>
                    @endif

                </tr>
                </thead>
                <tbody>
                @foreach($hospitales as $hospital)
                    <tr>
                        <td class="textTransform">
                            {{ $hospital->nombre }}
                        </td class="textTransform">

                        <td class="textTransform">
                            
                            {{ $hospital->status }}
                        </td>
                        @if(Auth::User()->rol === 'coordinador')
                        <td>
                            <a href="{{ route('editHospital',[$hospital->id]) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('deleteHospital',[$hospital->id]) }}">
                                
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


