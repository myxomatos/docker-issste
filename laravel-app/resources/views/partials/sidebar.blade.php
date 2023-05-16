<div class="uk-card uk-card-default card_admin_sidebar">
    <ul class="uk-nav uk-nav-default" style="font-size: 16px">

        <li>
            @if(Auth::User()->rol === 'coordinador')
                <a href="{{ route('subcoordinadoresIndex') }}"><span class="uk-margin-small-right" style="font-size: 16px" uk-icon="icon: thumbnails"></span>
                    Subcordinadores
                </a>
            @endif
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'subcoordinador')
                <a href="{{ route('hospitalesIndex') }}">
                    <span class="uk-margin-small-right" uk-icon="icon: table"></span>
                    Hospitales
                </a>
            @endif
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'subcoordinador')
                <a href="{{ route('enlacesIndex') }}"><span class="uk-margin-small-right" uk-icon="icon: trash"></span>
                    Enlaces
                </a>
            @endif
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'enlace')
                <a href="{{ route('indexCensos') }}"><span class="uk-margin-small-right" uk-icon="icon: trash"></span>
                    Censos
                </a>
            @endif
        </li>
        <li>
            <a href="{{ route('aeropuerto') }}"target="_blank"><span class="uk-margin-small-right" uk-icon="icon: trash"></span>
                Sistema Aeropuerto
            </a>
        </li>
        <li>
            <a href="{{ route('directorio') }}"target="_blank"><span class="uk-margin-small-right" uk-icon="icon: trash"></span>
                Directorio
            </a>
        </li>

        <div class="uk-text-center" style="margin-top: 40px">
            <a href="{{ route('createActividades') }}">
                <button type="submit" class="button_back_2"style="width: 170px;height: 30px">
                Crear Actividad
                </button>
            </a>
        </div>
        @if(Auth::User()->check_in === 1)
            <div class="uk-text-center" style="margin-top: 40px">
                <a href="{{ route('createCheckOut') }}">
                    <button type="submit" class="button_back_2"style="width: 170px;height: 30px">
                        Check Out
                    </button>
                </a>
            </div>
        @endif
    </ul>
</div>
