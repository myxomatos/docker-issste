@extends('layout.home')

@section('content')

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>

        <div class="uk-width-expand@m">
            <div class="uk-text-center uk-margin-medium">
                <a href="{{ route('indexCensos') }}">
                    <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                        Volver
                    </button>
                </a>

            </div>
            <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Genero</th>
                    <th>Edad</th>
                    <th>RFC</th>
                    <th>Acciones</th>

                </tr>
                </thead>
                <tbody>
                @foreach($censos as $i)
                    <tr>
                        <td>
                            {{ $i->nombre }}
                        </td>

                        <td>
                            {{ $i->apellidos }}
                        </td>
                        <td>
                            {{ $i->genero }}
                        </td>
                        <td>
                            {{ $i->edad }}
                        </td>
                        <td>
                            {{ $i->rfc }}
                        </td>
                        <td>
                        <a href="{{ route('editCenso',[$i->id]) }}">
                                Editar
                            </a><br>
                            <a href="{{ route('showHistoricoCenso',[$i->id]) }}">
                                Ver Historial
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>



@endsection


