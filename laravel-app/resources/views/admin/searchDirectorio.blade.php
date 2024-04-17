@extends('layout.home')

@section('content')

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>

        <div class="uk-width-expand@m">
            <div class="uk-text-center uk-margin-medium">
                <a href="{{ route('directorio') }}">
                    <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                        Volver
                    </button>
                </a>

            </div>
            <table class="uk-table uk-table-striped">
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


