@extends('layout.home')

@section('content')
<style>
    thead th {
            top: 0;
            left: 0;
            background-color: #36304a;
            cursor: pointer;
            color: white;
        }
</style>
<div uk-grid>
    <div class="uk-visible@m uk-width-1-6@m">
        @include('partials.sidebar')
    </div>
    <div class="uk-width-expand@m uk-margin-top uk-margin-right uk-margin-bottom">
        <div>
            <div class="uk-text-center">
                <p class="color_7" style="font-size: 2.5vh;">Total de Actividades {{ $total_actividades }}</p>
                
            </div>

            <table class="uk-table uk-table-striped" style="font-size: 1.4vh;">
                <thead>
                <tr>
                    <th style="color: white;">Fecha / Hora</th>
                    <th style="color: white;">Hospital</th>
                    <th style="color: white;">Nombre</th>
                    <th style="color: white;">Actividad</th>
                    <th style="color: white;">Tarea</th>
                    <th style="color: white;">Tipo de Actividad</th>
                    <th style="color: white;">Notas</th>
                    @if(Auth::User()->rol === 'coordinadorad')
                        <div></div>
                    @else
                    <th style="color: white;">Crear Incidencia</th>
                    @endif
                </tr>
                </thead>
                <tbody>

                @foreach($actividades as $i)
                    <tr>
                        <td class="textTransform">{{ date('d-m-Y H:i:s', strtotime($i->created_at)) }}</td>
                        @if(Auth::User()->rol === 'subcoordinador' or 'coordinador' or 'coordinadorad')
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
                        @else
                        <td class="textTransform">{{Auth::user()->hospitales->nombre}}</td>
                        @endif
                        @if(Auth::User()->rol === 'enlace')
                        <td class="textTransform">{{$i->user->name}} {{$i->user->apellido}}</td>
                        @else
                            <td class="textTransform">{{$i->enlaceNombre}} {{$i->enlaceApellido}}</td>
                        @endif
                        <td class="textTransform">{{ $i->nombre}}</td>
                        <td class="textTransform">{{ $i->descripcion_actividad }}</td>
                        <td class="textTransform">{{ $i->descripcion_subactividad }}</td>
                        <td class="textTransform">{{ $i->notas }}</td>
                        @if(Auth::User()->rol === 'coordinadorad')
                        <div></div>
                        @else
                            <td>
                                <li class="uk-text-center">
                                    <a href="{{ route('createIncidencias', $i->id) }}" uk-icon="icon: file-edit"></a>
                                </li>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>

            </table>
            @if(count($actividades) !== 0)
            <div class="uk-text-center">
            {{ $actividades->links() }}
{{--                    {!! $actividades->links("partials.paginate") !!}--}}
            </div>
            @else
            <div></div>
            @endif
        </div>
        <hr>
        <div>
            <div>
                <div class="uk-text-center">
                  <p class="color_7" style="font-size: 2.5vh;">Total de Incidencias {{ $total_incidencias }}</p>
                    
                </div>
                <table class="uk-table uk-table-striped" style="font-size: 1.4vh;">
                    <thead>
                    <tr>
                        <th style="color: white;">Fecha / Hora</th>
                        <th style="color: white;">Usuario</th>
                        <th style="color: white;">Hospital</th>
                        <th style="color: white;">Nombre Evidencia</th>
                        <th style="color: white;">Archivo Evidencia</th>
                        <th style="color: white;">Notas</th>
                        <th style="color: white;">Asignado</th>
                        <th style="color: white;">Status</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($incidencias as $i)
                        <tr>
                            <td class="textTransform">{{ date('d-m-Y H:i:s', strtotime($i->created_at)) }}</td>
                            @if(Auth::User()->rol === 'enlace')
                            <td class="textTransform">{{ $i->user->name }} {{ $i->user->apellido }}</td>
                            @else
                                <td class="textTransform">{{$i->enlaceNombre}} {{$i->enlaceApellido}}</td>
                            @endif
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
                            <td class="textTransform">{{ $i->nombre }}</td>
                            <td class="textTransform">{{ $i->cargar_evidencia }}</td>
                            <td class="textTransform">{{ $i->notas }}</td>
                            <td class="textTransform">{{ $i->asignacion }}</td>
                            <td class="textTransform">
                                <a href="{{ route('showIncidencia', $i->id) }}">
                                    {{ $i->status }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(count($incidencias) !== 0)
                <div class="uk-text-center">
                {{ $incidencias->links() }}
{{--                    {!! $incidencias->links("partials.paginate") !!}--}}
                </div>
                @else
                <div></div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
