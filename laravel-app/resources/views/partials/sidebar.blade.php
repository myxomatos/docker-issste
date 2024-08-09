<div class="uk-card uk-card-default card_admin_sidebar">
    
    <ul class="uk-nav uk-nav-default" style="font-size: 1.6vh;">
        <li>
            <a href="{{ route('indexPacientes') }}"><span class="uk-margin-small-right" uk-icon="icon: search"></span>
            Búsqueda de Pacientes
            </a>
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'enlace' or Auth::User()->rol === 'administrador' or Auth::User()->rol === 'coordinadorad')
            <a href="{{ route('indexCensos') }}"><span class="uk-margin-small-right" uk-icon="icon: list"></span>
            Censos
            </a>
            @endif
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'administrador')
            <a href="{{ route('coordinadoresAdIndex') }}"><span class="uk-margin-small-right" uk-icon="icon: location"></span>
            Coordinadores AD
        </a>
        @endif
        </li>
        <li>
            <a href="{{ route('directorio') }} "><span class="uk-margin-small-right" uk-icon="icon: file-text"></span>
                Directorio
            </a>
        </li>
        <li>
                <a href="{{ route('egresosIndex') }}"><span class="uk-margin-small-right" uk-icon="icon: pull"></span>
                    Egresos
                </a>
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'administrador' or Auth::User()->rol === 'coordinadorad')
                <a href="{{ route('enlacesIndex') }}"><span class="uk-margin-small-right" uk-icon="icon: user"></span>
                    Enlaces
                </a>
            @endif
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'administrador' or Auth::User()->rol === 'coordinadorad')
                <a href="{{ route('hospitalesIndex') }}">
                    <span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span>
                    Hospitales
                </a>
            @endif
        </li>
        <li>
            <a href="{{ route('aeropuerto') }}"target="_blank"><span class="uk-margin-small-right" uk-icon="icon: settings"></span>
                Sistema Aeropuerto
            </a>
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'administrador')
                <a href="{{ route('subcoordinadoresIndex') }}"><span class="uk-margin-small-right" uk-icon="icon: users"></span>
                    Subcoordinadores
                </a>
            @endif
        </li>
        @if(Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'enlace')
        <div class="uk-text-left" style="margin-top: 40px">
            <a href="{{ route('createActividades') }}">
                <button type="button" class="button_back_2"style="width: 170px;height: 30px; font-size: 14px;">
                Crear Actividad
                </button>
            </a>
        </div>
        @endif
    </ul>
</div>