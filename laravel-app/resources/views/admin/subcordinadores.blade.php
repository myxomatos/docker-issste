@extends('layout.home')

@section('content')
    <div class="uk-padding">
        <a href="{{ route('homeIndexPanel') }}">
            <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                Volver
            </button>
        </a>
        <h2 class="color_7">
            Subcoordinadores
        </h2>
        <table class="uk-table uk-table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Hora entrada</th>
                <th>Hora salida</th>
                <th>Hospital</th>
            </tr>
            </thead>
            <tbody>
                @foreach($subcordinadores as $subcordinador)
                    <tr>
                        <td>
                            {{ $subcordinador->name }}
                        </td>
                        <td>
                            {{ $subcordinador->apellido }}
                        </td>
                        <td>
                            {{ date('d-m-Y H:i:s', strtotime($subcordinador->entrada)) }}
                        </td>
                        <td>
                            {{ date('d-m-Y H:i:s', strtotime($subcordinador->salida)) }}
                        </td>
                        <td>
                            {{ $subcordinador->hospitales->nombre }}
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        @endsection
    </div>



