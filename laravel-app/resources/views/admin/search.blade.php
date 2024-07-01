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
                <tr>
                        <th>Acciones</th>
                        <th>Nombre</th>
                        <th>Cama</th>
                        <th>RFC</th>
                        <th>Genero</th>
                        <th>Fecha de nacimiento</th>
                        <th>Tipo Derechohabiente</th>
                        <th>Tipo Hospitalizacion</th>
                        <!-- <th>Diagnostico</th> -->
                        <th>Hospital</th>
                        <!-- <th>Doctor</th> -->
                        <th>Estado</th>
                    </tr>
                </tr>
                </thead>
                <tbody>
                @foreach($censos as $i)
                    <tr>
                    <td>
                                <a style="color: #0FA4AF;" href="{{ route('editCenso',[$i->id]) }}">
                                    Editar
                                </a><br>
                                <a style="color: red;" href="{{ route('showHistoricoCenso',[$i->id]) }}">
                                    Ver Historial
                                </a>

                            </td>
                            <td class="textTransform">
                                {{ $i->nombre }} {{ $i->apellidos }}
                            </td>
                            <td>
                                {{ $i->cama }}
                            </td>
                            <td>
                                {{ $i->rfc }}
                            </td>
                            <td class="textTransform">
                                {{ $i->genero }}
                            </td>
                            <td>
                                {{ $i->edad }}
                            </td>
                            <td>
                                {{ $i->tipo_derechohabiente }}
                            </td>
                            <td>
                                {{ $i->tipo_hospitalizacion }}
                            </td>
                            <!-- <td class="textTransform">
                                {{ $i->diagnostico }}
                            </td> -->
                            <td class="textTransform">
                                {{ $i->hospitales->nombre }}
                            </td>
                            <!-- <td class="textTransform">
                                {{ $i->doctor }}
                            </td> -->
                            <td class="textTransform">
                                {{ $i->status }}
                            </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>



@endsection


