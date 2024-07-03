<div class="uk-card uk-card-default card_admin_sidebar">
    <ul class="uk-nav uk-nav-default" style="font-size: 16px">

        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'administrador')
                <a href="{{ route('subcoordinadoresIndex') }}"><span class="uk-margin-small-right" style="font-size: 16px" uk-icon="icon: users"></span>
                    Subcoordinadores
                </a>
            @endif
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'administrador')
                <a href="{{ route('coordinadoresAdIndex') }}"><span class="uk-margin-small-right" style="font-size: 16px" uk-icon="icon: users"></span>
                    Coordinadores AD
                </a>
            @endif
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'administrador')
                <a href="{{ route('hospitalesIndex') }}">
                    <span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span>
                    Hospitales
                </a>
            @endif
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'administrador')
                <a href="{{ route('enlacesIndex') }}"><span class="uk-margin-small-right" uk-icon="icon: user"></span>
                    Enlaces
                </a>
            @endif
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'enlace' or Auth::User()->rol === 'administrador')
                <a href="{{ route('indexCensos') }}"><span class="uk-margin-small-right" uk-icon="icon: list"></span>
                    Censos
                </a>
            @endif
        </li>
        <li>
            <a href="{{ route('aeropuerto') }}"target="_blank"><span class="uk-margin-small-right" uk-icon="icon: settings"></span>
                Sistema Aeropuerto
            </a>
        </li>
        <li>
            <a href="{{ route('directorio') }}"target="_blank"><span class="uk-margin-small-right" uk-icon="icon: file-text"></span>
                Directorio
            </a>
        </li>
        @if(Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'enlace')
        <div class="uk-text-left" style="margin-top: 40px">
            <a href="{{ route('createActividades') }}">
                <button type="submit" class="button_back_2"style="width: 170px;height: 30px; font-size: 14px;">
                Crear Actividad
                </button>
            </a>
        </div>
        @endif
        @if(Auth::User()->check_in === 1)
            <div class="uk-text-left" style="margin-top: 40px">
                <a href="{{ route('createCheckOut') }}">
                    <button type="submit" class="button_back_2" style="width: 170px; height: 30px; font-size: 14px;">
                        Cerrar Sesión
                    </button>
                </a>
            </div>
        @endif
    </ul>
</div>
