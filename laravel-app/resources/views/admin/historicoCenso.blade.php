@extends('layout.home')

@section('content')

<style>
    /* The actual timeline (the vertical ruler) */
    .timeline {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    }

    /* The actual timeline (the vertical ruler) */
    .timeline::after {
    content: '';
    position: absolute;
    width: 6px;
    background-color: black;
    top: 0;
    bottom: 0;
    left: 50%;
    z-index: -1;
    }

</style>

    @php
        setlocale(LC_TIME, 'Spanish');
        $fecha = new Carbon\Carbon($censo->created_at);
        $days = $fecha->formatLocalized('%d %B %Y - %H:%M');
    @endphp
    <div uk-grid>

    <div class="uk-panel uk-panel-box" style="background-color: #691c32;">
        <h2 class="uk-panel-title" style="color: #ffffff; margin: 10px 20px; font-size: 2.4vh;">Paciente:</h2>
        <ul class="uk-nav uk-nav-side" style="font-size: 1.4vh; background-color: #be335a; margin: 4px 8px; padding: 16px;">
            <li>
                <h3 class="uk-panel-title" style="color: #ffffff; margin: 10px 14px; font-size: 1.8vh;">{{ $censo->nombre }} {{ $censo->apellidos }}</h3>        
            </li>
            <li>
                <h3 class="uk-panel-title" style="color: #c8c8c8; margin: 10px 14px; font-size: 1.8vh;">Genero: <span style="text-transform: capitalize; color: #ffffff;">{{ $censo->genero }}</span></h3>        
            </li>
            <li>
                <h3 class="uk-panel-title" style="color: #c8c8c8; margin: 10px 14px; font-size: 1.8vh;">RFC: <span style="text-transform: capitalize; color: #ffffff;">{{ $censo->rfc }}</span></h3>        
            </li>
            <li>
                <h3 class="uk-panel-title" style="color: #c8c8c8; margin: 10px 14px; font-size: 1.8vh;">Fecha de Nacimiento: <span style="text-transform: capitalize; color: #ffffff;">{{ $censo->edad }}</span></h3>        
            </li>
            <li>
                <h3 class="uk-panel-title" style="color: #c8c8c8; margin: 10px 14px; font-size: 1.8vh;">Tipo de Derechohabiente: <span style="text-transform: capitalize; color: #ffffff;">{{ $censo->tipo_derechohabiente }}</span></h3>        
            </li>
            <li style="margin-top: 80px;">
                <h3 class="uk-panel-title" style="color: #c8c8c8; margin: 10px 14px; font-size: 1.8vh;">Fecha de último Ingreso: <span style="text-transform: capitalize; color: #ffffff;">{{ $days }}</span></h3>        
            </li>
            <li>
                <h3 class="uk-panel-title" style="color: #c8c8c8; margin: 10px 14px; font-size: 1.8vh;">Estado: <span style="text-transform: capitalize; color: #ffffff;">{{ $censo->status }}</span></h3>        
            </li>
            <li>
                <h3 class="uk-panel-title" style="color: #c8c8c8; margin: 10px 14px; font-size: 1.8vh;">Tipo de Hospitalizacion: <span style="text-transform: capitalize; color: #ffffff;">{{ $censo->tipo_hospitalizacion }}</span></h3>        
            </li>
            <li>
                <h3 class="uk-panel-title" style="color: #c8c8c8; margin: 10px 14px; font-size: 1.8vh;">Dato de Salud: <span style="text-transform: capitalize; color: #ffffff;">{{ $censo->dato_salud }}</span></h3>        
            </li>
            <li>
                <h3 class="uk-panel-title" style="color: #c8c8c8; margin: 10px 14px; font-size: 1.8vh;">Folio: <span style="text-transform: capitalize; color: #ffffff;">{{ $censo->folio }}</span></h3>        
            </li>
        
        </ul>
    </div>
            <div class="uk-width-expand@m padd_style">
            <div class="uk-align-right">
                <a href="{{ route('indexCensos') }}">
                    <button class="button_back" style="float: right; margin: 10px;">
                        Volver
                    </button>
                </a>
            </div> 
            
            @if($historial == '[]')

            <h4 class="uk-article-title color_1" style="text-align: center;">Paciente sin historial</h4>

            @else

            <h2 class="uk-article-title color_1" style="margin-left: 110px;">Historial</h2>
            <div class="timeline">

            @foreach($historial as $h)
                @php
                    setlocale(LC_TIME, 'Spanish');
                    $fecha = new Carbon\Carbon($h->fecha_coment);
                    $fecha_coment = $fecha->formatLocalized('%d %B %Y - %H:%M');
                @endphp

                <article class="uk-comment uk-comment-primary" role="comment" style="margin: 40px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                    <header class="uk-comment-header">
                        <div class="uk-grid-medium uk-flex-middle" uk-grid>
                            <div class="uk-width-expand">
                                <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                    <li style="font-size: 18px;" >Fecha de Actualizacíon {{ $fecha_coment }} por&nbsp<span style="font-size: 18px; color: #9f2241;">{{ $h->name }} {{ $h->apellido }}</span>:</li>
                                    @if ($h->hospital == '')
                                        <di></di>
                                    @else
                                        <li style="font-size: 18px;" >Hospital&nbsp
                                        @if ($h->hospital == 1)
                                            <span style="font-size: 18px; color: #9f2241;">H.R. 1° DE OCTUBRE</span>
                                        @elseif ($h->hospital == 2)
                                            <span style="font-size: 18px; color: #9f2241;">H.G. DR. FERNANDO QUIROZ GUTIÉRREZ</span>
                                        @elseif ($h->hospital == 3)
                                            <span style="font-size: 18px; color: #9f2241;">H.G. DR. DARÍO FERNÁNDEZ FIERRO</span>
                                        @elseif ($h->hospital == 4)
                                            <span style="font-size: 18px; color: #9f2241;">H.R. GRAL. IGNACIO ZARAGOZA</span>
                                        @elseif ($h->hospital == 5)
                                            <span style="font-size: 18px; color: #9f2241;">H.G. GRAL. JOSÉ MARÍA MORELOS Y PAVÓN</span>
                                        @elseif ($h->hospital == 6)
                                            <span style="font-size: 18px; color: #9f2241;">CENTRO MÉDICO NACIONAL 20 DE NOVIEMBRE</span>
                                        @elseif ($h->hospital == 7)
                                            <span style="font-size: 18px; color: #9f2241;">H.R. LIC. ADOLFO LÓPEZ MATEOS</span>
                                        @elseif ($h->hospital == 8)
                                            <span style="font-size: 18px; color: #9f2241;">H.G. TACUBA</span>
                                        @elseif ($h->hospital == 9)
                                            <span style="font-size: 18px; color: #9f2241;">H.A.E. BICENTENARIO DE LA INDEPENDENCIA</span>
                                        @elseif ($h->hospital == 10)
                                            <span style="font-size: 18px; color: #9f2241;">H.R. LEON</span>
                                        @elseif ($h->hospital == 11)
                                            <span style="font-size: 18px; color: #9f2241;">H.R. VALENTIN GOMEZ FARIAS</span>
                                        @elseif ($h->hospital == 12)
                                            <span style="font-size: 18px; color: #9f2241;">H.R. MORELIA</span>
                                        @elseif ($h->hospital == 13)
                                            <span style="font-size: 18px; color: #9f2241;">H.A.E. CENTENARIO DE LA REVOLUCION MEXICANA</span>
                                        @elseif ($h->hospital == 14)
                                            <span style="font-size: 18px; color: #9f2241;">H.R. MONTERREY</span>
                                        @elseif ($h->hospital == 15)
                                            <span style="font-size: 18px; color: #9f2241;">H.R. PRESIDENTE BENITO JUAREZ</span>
                                        @elseif ($h->hospital == 16)
                                            <span style="font-size: 18px; color: #9f2241;">H.R. PUEBLA</span>
                                        @elseif ($h->hospital == 17)
                                            <span style="font-size: 18px; color: #9f2241;">H.R. DR. MANUEL CARDENAS DE LA VEGA</span>
                                        @elseif ($h->hospital == 18)
                                            <span style="font-size: 18px; color: #9f2241;">H.A.E. VERACRUZ</span>
                                        @elseif ($h->hospital == 19)
                                            <span style="font-size: 18px; color: #9f2241;">H.R. MERIDA</span>
                                        @endif
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </header>
                    <div class="uk-comment-body">
                        <h4>Comentarios:</h4>
                        <p style="font-size: 16px; color: #9f2241;">
                            {{ $h->comentario }}
                        </p>
                        @if($h->egreso === null)
                        <div></div>
                        @else
                        <h4>Tipo de Egreso:</h4>
                        <p style="font-size: 16px; color: #9f2241;">
                            {{ $h->egreso }}
                        </p>
                        @endif
                    </div>
                </article>
             @endforeach
             @endif
        </div>
</div>

@endsection
