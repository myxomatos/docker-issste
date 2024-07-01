@extends('layout.home')

@section('content')
    <style>
        .scroll {
            overflow-x: scroll;
            overflow-y: hidden;
            white-space:nowrap;
        }
    </style>
    <div>
        <div class="uk-padding">
        <a href="{{ route('homeIndexPanel') }}">
                        <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                            Volver
                        </button>
                    </a>
            <article class="uk-article">

                <h2 class="uk-article-title color_1 uk-text-center"><a class="uk-link-reset" href="">Directorio SIRAESU</a></h2>
            </article>
            <form style="width: 300px" class="uk-search uk-search-default" type="get" action="{{ url('/searchDirectorio') }}">
                            <div class="">
                                <input class="uk-search-input color_7" name="query" type="searchDirectorio" placeholder="Buscar en el Directorio" aria-label="Search" aria-label="Search">
                                    <button class="button_back" style="margin-top: 4px;" type="submit">
                                        Buscar
                                    </button>
                            </div>
                            
            </form>
        </div>
        <div class="scroll" style="padding: 0px 20px 0px 20px">
            <table class="uk-table uk-table-striped" style="font-size: 0.75vw;">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Hospital</th>
                        <th>Turno</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($usuario as $u)
                    <tr>
                        <td class="textTransform">
                            {{ $u->name }} {{ $u->apellido }}
                        </td>
                        <td >
                            {{ $u->email }}
                        </td>
                        <td class="textTransform">
                            {{ $u->rol }}
                        </td>
                        <td>
                            {{ $u->hospitales->nombre }}
                        </td>
                        <td>
                            {{ $u->turno }}
                        </td>
                        <td>
                            {{ $u->telefono }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
