@extends('layout.home')

@section('content')
    @php
        setlocale(LC_TIME, 'Spanish');
        $fecha = new Carbon\Carbon($censo->created_at);
        $days = $fecha->formatLocalized('%d %B %Y');
    @endphp

    
    <div class="uk-padding">
    <a href="{{ route('egresosIndex') }}">
                        <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                            Volver
                        </button>
                    </a>
        <article class="uk-article">

            <h2 class="uk-article-title color_1"><a class="uk-link-reset" href="">Historial del paciente {{ $censo->nombre }} {{ $censo->apellidos }}</a></h2>

            <p class="uk-article-meta"> Fecha de Ingreso: {{ $days }}</p>
            <p class="uk-article-meta"> Folio: {{ $censo->folio }}</p>
            <p class="uk-article-meta"> Nombre: {{ $censo->nombre }}</p>
            <p class="uk-article-meta"> Apellidos: {{ $censo->apellidos }}</p>
            <p class="uk-article-meta" style="text-transform: capitalize"> Genero: {{ $censo->genero }}</p>
            <p class="uk-article-meta"> Cama: {{ $censo->cama}}</p>
            <p class="uk-article-meta"> RFC: {{ $censo->rfc}}</p>
            <p class="uk-article-meta"> Tipo Derechohabiente: {{ $censo->tipo_derechohabiente}}</p>
            <p class="uk-article-meta"> Fecha de nacimiento: {{ $censo->edad }}</p>
            <p class="uk-article-meta"> Doctor: {{ $censo->doctor }}</p>
            <!-- <p class="uk-article-meta"> Diagnóstico: {{ $censo->diagnostico}}</p> -->
            <!-- <p class="uk-article-meta"> Tipo Hospitalización: {{ $censo->tipo_hospitalizacion}}</p> -->
            <p class="uk-article-meta"> Telefono: {{ $censo->telefono}}</p>

            <h2 class="uk-article-title color_1"><a class="uk-link-reset" href="">Comentarios</a></h2>

            @foreach($historial as $h)
                @php
                    setlocale(LC_TIME, 'Spanish');
                    $fecha = new Carbon\Carbon($h->fecha_coment);
                    $fecha_coment = $fecha->formatLocalized('%d %B %Y');
                @endphp
                <article class="uk-comment uk-comment-primary" role="comment" >
                    <header class="uk-comment-header">
                        <div class="uk-grid-medium uk-flex-middle" uk-grid>
                            <div class="uk-width-expand">
                                <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                    <li style="font-size: 18px;" >Fecha de Actualizacíon {{ $fecha_coment }} por&nbsp<span style="font-size: 18px; color: #9f2241;">{{ $h->name }} {{ $h->apellido }}</span>:</li>
                                </ul>
                            </div>
                        </div>
                    </header>
                    <div class="uk-comment-body">
                        <p>
                            {{ $h->comentario }}
                        </p>
                    </div>
                </article>
             @endforeach


            <p class="uk-text-lead">
{{--                {{ $incidencia->descripcion }} --}}
            </p>


        </article>
    </div>

@endsection
