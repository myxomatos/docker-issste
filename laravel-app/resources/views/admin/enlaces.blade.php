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
                <th>Hospital</th>
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
                    @if ($enlace->hospital_id == 1)
                                <td class="textTransform">H.R. 1° DE OCTUBRE</td>
                            @elseif ($enlace->hospital_id == 2)
                                <td class="textTransform">H.G. DR. FERNANDO QUIROZ GUTIÉRREZ</td>
                            @elseif ($enlace->hospital_id == 3)
                                <td class="textTransform">H.G. DR. DARÍO FERNÁNDEZ FIERRO</td>
                            @elseif ($enlace->hospital_id == 4)
                                <td class="textTransform">H.R. GRAL. IGNACIO ZARAGOZA</td>
                            @elseif ($enlace->hospital_id == 5)
                                <td class="textTransform">H.G. GRAL. JOSÉ MARÍA MORELOS Y PAVÓN</td>
                            @elseif ($enlace->hospital_id == 6)
                                <td class="textTransform">CENTRO MÉDICO NACIONAL 20 DE NOVIEMBRE</td>
                            @elseif ($enlace->hospital_id == 7)
                                <td class="textTransform">H.R. LIC. ADOLFO LÓPEZ MATEOS</td>
                            @elseif ($enlace->hospital_id == 8)
                                <td class="textTransform">H.G. TACUBA</td>
                            @elseif ($enlace->hospital_id == 9)
                                <td class="textTransform">H.A.E. BICENTENARIO DE LA INDEPENDENCIA</td>
                            @elseif ($enlace->hospital_id == 10)
                                <td class="textTransform">H.R. LEON</td>
                            @elseif ($enlace->hospital_id == 11)
                                <td class="textTransform">H.R. VALENTIN GOMEZ FARIAS</td>
                            @elseif ($enlace->hospital_id == 12)
                                <td class="textTransform">H.R. MORELIA</td>
                            @elseif ($enlace->hospital_id == 13)
                                <td class="textTransform">H.A.E. CENTENARIO DE LA REVOLUCION MEXICANA</td>
                            @elseif ($enlace->hospital_id == 14)
                                <td class="textTransform">H.R. MONTERREY</td>
                            @elseif ($enlace->hospital_id == 15)
                                <td class="textTransform">H.R. PRESIDENTE BENITO JUAREZ</td>
                            @elseif ($enlace->hospital_id == 16)
                                <td class="textTransform">H.R. PUEBLA</td>
                            @elseif ($enlace->hospital_id == 17)
                                <td class="textTransform">H.R. DR. MANUEL CARDENAS DE LA VEGA</td>
                            @elseif ($enlace->hospital_id == 18)
                                <td class="textTransform">H.A.E. VERACRUZ</td>
                            @elseif ($enlace->hospital_id == 19)
                                <td class="textTransform">H.R. MERIDA</td>
                            @endif

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
                        {{ $enlace->subcoordinadorNombre }} {{ $enlace->subcoordinadorApellido }}
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


