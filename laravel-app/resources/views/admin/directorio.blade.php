@extends('layout.home')

@section('content')
    <div>
        <div class="uk-padding">
        <a href="{{ route('homeIndexPanel') }}">
                        <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                            Volver
                        </button>
                    </a>
            <article class="uk-article">

                <h2 class="uk-article-title color_1 uk-text-center"><a class="uk-link-reset" href="">Directorio ISSSTE</a></h2>
            </article>
        </div>
        <div class=""style="padding: 0px 20px 0px 20px">
            <table class="uk-table uk-table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Hospital</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($usuario as $u)
                    <tr>
                        <td class="textTransform">
                            {{ $u->name }} {{ $u->apellido }}
                        </td>
                        <td class="textTransform">
                            {{ $u->email }}
                        </td>
                        <td>
                            {{ $u->rol }}
                        </td>
                        <td class="textTransform">
                            {{ $u->hospitales->nombre }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
