@extends('layout.home')

@section('content')

    <div class="uk-padding">
        <article class="uk-article">

            <h2 class="uk-article-title color_1 uk-text-center">Resumen de Actividad</h2>

            @if($actividades->status == 'pendiente')
                <span class="uk-badge color_darkred"style="text-transform: capitalize">{{ $actividades->status }}</span>
            @elseif($actividades->status == 'resuelto')
                <span class="uk-badge color_green"style="text-transform: capitalize">{{ $actividades->status }}</span>
            @endif
            <p class="uk-article-meta">Creado por: {{ $actividades->user->name }} {{ $actividades->user->apellido }}</p>

            <p class="uk-article-meta" style="color: #BC955C; font-size: 18px"> ACTIVIDAD #1: {{ $actividades->nombre }}</p>
            <p class="uk-article-meta" style="color: #BC955C; font-size: 18px"> ACTIVIDAD #2: {{ $actividades->descripcion_actividad }}</p>
            <p class="uk-article-meta" style="color: #BC955C; font-size: 18px"> ACTIVIDAD #3: {{ $actividades->descripcion_subactividad }}</p>
            <p class="uk-article-meta" style="color: #BC955C; font-size: 18px"> NOTAS: {{ $actividades->notas }}</p>

            <div class="uk-margin">
                <form  method="POST" action="{{ route('updateActividades',[$actividades->id]) }}" class="uk-form-stacked">
                    @csrf
                    <label class="uk-form-label" for="form-stacked-select"style="font-size: 17px">Status</label>
                    <select class="form-select" name="status" aria-label="Default select example"style="width: 200px">
                        <option value="pendiente">Pendiente</option>
                        <option value="resuelto">Resuelto</option>
                    </select>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-select"style="font-size: 17px">Agregar nuevas Notas</label>
                        <div class="uk-form-controls">
                            <textarea required name="notas" class="uk-input" id="form-stacked-text" type="text"></textarea>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-grid-small uk-child-width-auto" uk-grid>
                            <a href="{{ route('homeIndexPanel') }}">
                                <button type="button" class="button_back"style="width: 150px;height: 30px">
                                    Cancelar
                                </button>
                            </a>
                            <div>
                                <a class="uk-button uk-button-text color_6" href="{{ route('createIncidencias',[$actividades->id]) }}">
                                    <button type="button" class="button_back"style="width: 150px;height: 30px">
                                        Crear Incidencia
                                    </button>
                                </a>
                            </div>
                            <div>
                                <button type="submit" class="button_back"style="width: 150px;height: 30px">
                                    Guardar actividad
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </article>
    </div>
@endsection
