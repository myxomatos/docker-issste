<div class="uk-card uk-card-default card_admin_sidebar">
    <ul class="uk-nav uk-nav-default">

        <li>
            @if(Auth::User()->rol === 'coordinador')
                <a href="{{ route('subcoordinadoresIndex') }}"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span>
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
    </ul>
</div>
