@extends('layout.home')

@section('content')

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>
        <div class="uk-width-expand@m uk-margin-large-top uk-margin-large-bottom">
            <a href="{{ route('homeIndexPanel') }}">
                <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                    Volver
                </button>
            </a>
            <div class="uk-card uk-card-default uk-width-1-3@m"style="background:#691c32 ">

                <div class="uk-card-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-expand">
                            <h3 class=" uk-margin-remove-bottom color_7">{{ $usuario->name }} {{ $usuario->apellido }}</h3>
                        </div>
                    </div>
                </div>
                <div class="uk-card-body">
                    <ul class="uk-list "style="color: white">
                        <li>{{ $usuario->email }}</li>
                        <li style="text-transform: capitalize">{{ $usuario->rol }}</li>
                        @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'subcoordinador')
                            @foreach($hospitales as $h)
                                <li>{{ $h->nombre }}</li>
                            @endforeach

                        @else
                            <li>{{ $usuario->hospitales->nombre }}</li>
                         @endif
                        <li>{{ $usuario->turno}}</li>
                        <li>{{ $usuario->dias_laborales}}</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>



@endsection

