<style>

    #side-b-a-r {
        margin: 0;
        padding: 0;
        width: 300px;
        background-color: #f1f1f1;
        position: fixed;
        height: auto;
        overflow: auto;
        box-shadow: 6px 0px 8px 0px rgba(0,0,0,0.3);
        border: solid #D0D0D0 1px;
    }

    #ul-style {
        font-size: 1.8vh;
    }
    
    #ul-style li {
        margin-top: 15px;
    }
    
    #menu-links {
    background-image: linear-gradient(
        to right,
        #be335a,
        #be335a 50%,
        #000 50%
    );
    background-size: 200% 100%;
    background-position: -100%;
    display: inline-block;
    padding: 5px 0;
    position: relative;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    transition: all 0.3s ease-in-out;
    }

    #menu-links:before{
    content: '';
    background: #be335a;
    display: block;
    position: absolute;
    bottom: -3px;
    left: 0;
    width: 0;
    height: 3px;
    transition: all 0.3s ease-in-out;
    }

    #menu-links:hover {
    background-position: 0;
    }

    #menu-links:hover::before{
    width: 100%;
    }

</style>

<div id="side-b-a-r" >
    
    <ul id="ul-style" >
        <li>
            <a href="{{ route('indexPacientes') }}" id="menu-links"><span uk-icon="icon: search"></span>
            Búsqueda de Pacientes
            </a>
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'enlace' or Auth::User()->rol === 'administrador' or Auth::User()->rol === 'coordinadorad')
            <a href="{{ route('indexCensos') }}" id="menu-links"><span class="uk-margin-small-right" uk-icon="icon: list"></span>
            Censos
            </a>
            @endif
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'administrador')
            <a href="{{ route('coordinadoresAdIndex') }}" id="menu-links"><span class="uk-margin-small-right" uk-icon="icon: location"></span>
            Coordinadores AD
        </a>
        @endif
        </li>
        <li>
            <a href="{{ route('directorio') }} " id="menu-links"><span class="uk-margin-small-right" uk-icon="icon: file-text"></span>
                Directorio
            </a>
        </li>
        <li>
                <a href="{{ route('egresosIndex') }}" id="menu-links"><span class="uk-margin-small-right" uk-icon="icon: pull"></span>
                    Egresos
                </a>
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'administrador' or Auth::User()->rol === 'coordinadorad')
                <a href="{{ route('enlacesIndex') }}" id="menu-links"><span class="uk-margin-small-right" uk-icon="icon: user"></span>
                    Enlaces
                </a>
            @endif
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'administrador' or Auth::User()->rol === 'coordinadorad')
                <a href="{{ route('hospitalesIndex') }}" id="menu-links">
                    <span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span>
                    Hospitales
                </a>
            @endif
        </li>
        <li>
            <a href="{{ route('aeropuerto') }}"target="_blank" id="menu-links"><span class="uk-margin-small-right" uk-icon="icon: settings"></span>
                Sistema Aeropuerto
            </a>
        </li>
        <li>
            @if(Auth::User()->rol === 'coordinador' or Auth::User()->rol === 'administrador')
                <a href="{{ route('subcoordinadoresIndex') }}" id="menu-links"><span class="uk-margin-small-right" uk-icon="icon: users"></span>
                    Subcoordinadores
                </a>
            @endif
        </li>
        @if(Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'enlace')
        <li style="margin: 40px">
            <a href="{{ route('createActividades') }}">
                <button type="button" class="button_back_2"style="width: 150px;height: 30px; font-size: 14px;">
                Crear Actividad
                </button>
            </a>
        </li>
        @endif
    </ul>
</div>