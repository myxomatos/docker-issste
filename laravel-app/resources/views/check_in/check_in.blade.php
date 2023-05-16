@extends('layout.check_in')

@section('content')

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebarsub')
        </div>
        <div class="uk-width-expand@m padd_style" style="margin: 150px;">
            <div class="uk-text-center">
                <h2>
                    Has actualizado con éxito tu horario de entrada.
                </h2>
                <a href="{{ route('homeIndexPanel') }}">
                    <button class="button_back_2" type="button">Volver</button>
                </a>
            </div>

        </div>

    </div>

@endsection