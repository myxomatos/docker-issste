@extends('layout.home')

@section('content')
    <div class="uk-padding">
        <h2 class="color_7">
            Subcoordinadores
        </h2>
        <table class="uk-table uk-table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Hora entrada</th>
                <th>Hora salida</th>
            </tr>
            </thead>
            <tbody>
                @foreach($subcordinadores as $subcordinador)
                    <tr>
                        <td>
                            {{ $subcordinador->name }}
                        </td>
                        <td>
                            {{ $subcordinador->entrada }}
                        </td>
                        <td>
                            {{ $subcordinador->salida }}
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        @endsection
    </div>



