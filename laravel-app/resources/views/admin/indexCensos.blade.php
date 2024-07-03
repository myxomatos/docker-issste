@extends('layout.home')

@section('content')
    <style>
        .scroll {
            overflow-x: scroll;
            overflow-y: scroll;
            white-space:nowrap;
        }
    </style>

    <div uk-grid style="padding: 18px;">
        

        <div class="uk-width-expand@m">
            <nav class="navbar">
                <div class="d-block" >
                    <a href="{{ route('homeIndexPanel') }}">
                        <button class="button_back" style="float: right; margin: 10px;">
                            Volver
                        </button>
                    </a>

                </div>
                <div class="uk-text-center">
                    <h2 class="color_7">
                        Censos
                    </h2>

                </div>
                <div class="d-block" style="margin-top: 10px;">
                        <form style="width: 300px" class="uk-search uk-search-default" type="get" action="{{ url('/search') }}">
                            <div class="">
                                <input class="d-inline uk-search-input color_7" name="query" type="search" placeholder="Buscar paciente" aria-label="Search" aria-label="Search">
                                <button type="submit" class="button_back_2">
                                    Buscar
                                </button>
                            </div>
                        </form>
                </div>
                @if(Auth::User()->rol === 'coordinadorad')
                <div></div>
                @else
                <div class="d-block" style="margin-top: 50px;">
                    <a href="{{ route('createCenso') }}">        
                        <button class="button_back" style="float: center;">
                            Nuevo Censo
                        </button>
                    </a>
                </div>
                @endif
            </nav>
            <div class="scroll">
                <table class="uk-table uk-table-striped" style="font-size: 0.75vw;">
                    <thead>
                    <tr>
                        <th>Acciones</th>
                        <th>Ingreso</th>
                        <th>Nombre</th>
                        <th>Cama</th>
                        <th>RFC</th>
                        <th>Genero</th>
                        <th>Fecha de nacimiento</th>
                        <th>Tipo Derechohabiente</th>
                        <th>Tipo Hospitalizacion</th>
                        <th>Hospital</th>
                        <th>Dato de Salud</th>
                        <th>Estado</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($censos as $i)
                        <tr>
                            <td>
                            @if(Auth::User()->rol === 'coordinadorad')
                                <div></div>
                            @else
                                <a style="color: red;" href="{{ route('editCenso',[$i->id]) }}">
                                    Editar
                                </a><br>
                            @endif
                                <a style="color: #0FA4AF;" href="{{ route('showHistoricoCenso',[$i->id]) }}">
                                    Ver Historial
                                </a>

                            </td>
                            <td class="textTransform">
                                {{ date('d-m-Y H:i:s', strtotime($i->created_at)) }}
                            </td>
                            <td class="textTransform">
                                {{ $i->nombre }} {{ $i->apellidos }}
                            </td>
                            <td>
                                {{ $i->cama }}
                            </td>
                            <td>
                                {{ $i->rfc }}
                            </td>
                            <td class="textTransform">
                                {{ $i->genero }}
                            </td>
                            <td>
                                {{ $i->edad }}
                            </td>
                            <td>
                                {{ $i->tipo_derechohabiente }}
                            </td>
                            <td>
                                {{ $i->tipo_hospitalizacion }}
                            </td>
                            @if ($i->hospital_id == 1)
                                <td class="textTransform">H.R. 1° DE OCTUBRE</td>
                            @elseif ($i->hospital_id == 2)
                                <td class="textTransform">H.G. DR. FERNANDO QUIROZ GUTIÉRREZ</td>
                            @elseif ($i->hospital_id == 3)
                                <td class="textTransform">H.G. DR. DARÍO FERNÁNDEZ FIERRO</td>
                            @elseif ($i->hospital_id == 4)
                                <td class="textTransform">H.R. GRAL. IGNACIO ZARAGOZA</td>
                            @elseif ($i->hospital_id == 5)
                                <td class="textTransform">H.G. GRAL. JOSÉ MARÍA MORELOS Y PAVÓN</td>
                            @elseif ($i->hospital_id == 6)
                                <td class="textTransform">CENTRO MÉDICO NACIONAL 20 DE NOVIEMBRE</td>
                            @elseif ($i->hospital_id == 7)
                                <td class="textTransform">H.R. LIC. ADOLFO LÓPEZ MATEOS</td>
                            @elseif ($i->hospital_id == 8)
                                <td class="textTransform">H.G. TACUBA</td>
                            @elseif ($i->hospital_id == 9)
                                <td class="textTransform">H.A.E. BICENTENARIO DE LA INDEPENDENCIA</td>
                            @elseif ($i->hospital_id == 10)
                                <td class="textTransform">H.R. LEON</td>
                            @elseif ($i->hospital_id == 11)
                                <td class="textTransform">H.R. VALENTIN GOMEZ FARIAS</td>
                            @elseif ($i->hospital_id == 12)
                                <td class="textTransform">H.R. MORELIA</td>
                            @elseif ($i->hospital_id == 13)
                                <td class="textTransform">H.A.E. CENTENARIO DE LA REVOLUCION MEXICANA</td>
                            @elseif ($i->hospital_id == 14)
                                <td class="textTransform">H.R. MONTERREY</td>
                            @elseif ($i->hospital_id == 15)
                                <td class="textTransform">H.R. PRESIDENTE BENITO JUAREZ</td>
                            @elseif ($i->hospital_id == 16)
                                <td class="textTransform">H.R. PUEBLA</td>
                            @elseif ($i->hospital_id == 17)
                                <td class="textTransform">H.R. DR. MANUEL CARDENAS DE LA VEGA</td>
                            @elseif ($i->hospital_id == 18)
                                <td class="textTransform">H.A.E. VERACRUZ</td>
                            @elseif ($i->hospital_id == 19)
                                <td class="textTransform">H.R. MERIDA</td>
                            @endif
                            <td class="textTransform">
                                {{ $i->dato_salud }}
                            </td>
                            <td class="textTransform">
                                {{ $i->status }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <div class="uk-text-center">
                {{ $censos->links() }}
{{--                    {!! $censos->links("partials.paginate") !!}--}}
                </div>
            </div>

        </div>
    </div>



@endsection

