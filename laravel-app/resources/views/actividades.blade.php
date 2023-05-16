@extends('layout.home')

@section('content')

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>
        <div class="uk-width-expand@m padd_style">
            <div class="uk-text-center">
                <h2>
                    Actividad a realizar
                </h2>

            </div>
            <div class="uk-card uk-card-default uk-card-body "style="background: #bc955c">
                <form class="uk-form-stacked">
                    @csrf
                    <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-text-left" uk-grid>
                        <div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Categorias</label>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Notas</label>
                                <label class="uk-form-label" for="form-stacked-text">Actividad creada por:</label>
                                Enlace
                                <br>
                                Alan San
                                <br>
                                01/11/2022

                                <label class="uk-form-label" for="form-stacked-text">Actividad reasignada a:</label>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Notas nuevas</label>
                            <div class="uk-margin uk-form-width-large">
                                <textarea class="uk-textarea" rows="5" placeholder="Escribir nuevas notas"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="uk-margin uk-text-center uk-margin-medium-top">
                    <a href="{{ route('homeIndex') }}">
                        <button type="submit" class="button_back"style="width: 170px;height: 30px">
                            Cancelar actividad
                        </button>
                    </a>
                    <a href="{{ route('homeIndex') }}">
                        <button type="submit" class="button_back"style="width: 200px;height: 30px">
                            Guardar actividad
                        </button>
                    </a>
                    <a href="{{ route('incidencias') }}">
                        <button type="submit" class="button_back"style="width: 200px;height: 30px">
                            Crear incidencia
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

