@extends('layout.home')

@section('content')
    <p class="uk-text-center" uk-margin>
        <a href="{{ route('createActividades') }}">
            <button class="button_back"style="width: 210px;height: 40px">Ingresar actividad</button>
        </a>

    </p>
    @endsection
