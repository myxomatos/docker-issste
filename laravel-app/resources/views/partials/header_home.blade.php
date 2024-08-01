<nav class="uk-navbar-container" uk-navbar>
    <img style ="width: 40vw; " src="../../../public/img/Screenshot2024.png" alt="">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    @if(\Request::is('home/admin/aeropuerto') )

    @else
        <div id="notify" class="uk-navbar-right welcome" style="color: white">
            @if(Auth::User()->rol === 'subcoordinador' or Auth::User()->rol === 'coordinador')
                <script>
                    $(document).ready(function(){
                        var counter = 9;
                        window.setInterval(function(){
                            counter = counter - 3;
                            if(counter>=0){
                                document.getElementById('off').innerHTML=counter;
                            }
                            if (counter===0){
                                counter=9;
                            }
                            $("#notify").load(window.location.href + " #notify" );
                        }, 5000);
                    });

                </script>
                <div id="">
                    @if( ($notificacion->count() > 0 ))
                        <div class="uk-inline uk-margin-right">
                            <span class="box_animation" type="button" uk-icon="icon: mail;ratio: 1.4"></span>
                            <div uk-dropdown>
                                <ul class="uk-list uk-list-bullet">
                                    @foreach($notificacion as $i)
                                        <a href="{{ route('showIncidencia', $i->id) }}">
                                            <li style="font-size: 18px">{{ $i->nombre }}</li>
                                        </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>

            @endif
            @if(\Request::is('home/admin/aeropuerto')  )

            @else
                @auth
                    <p style="color: white; margin: 0; font-size: 1vw;">
                    Bienvenido(a) {{Auth::user()->name}} {{Auth::user()->apellido}}<br>
                    <span style="font-size: 0.8vw; color: gold">
                        
                        Hora de Entrada {{ date('d-m-Y H:i:s', strtotime(Auth::user()->entrada))}}
                    </span>
                        
                    </p>

                @endauth
            @endif
            <button class="uk-button uk-button-default" type="button"style="border: none">
                <span style="color: white" uk-icon="icon:  chevron-down; ratio: 1.5"></span>
            </button>
            <div uk-dropdown="animation: uk-animation-slide-top-small; animate-out: true">
                <ul class="uk-nav uk-dropdown-nav">
                    <li><a href="{{ route('homeIndexPanel') }}"><span class="uk-margin-small-right" uk-icon="icon: home"></span>Panel</a></li>
                    <li><a href="{{ route('perfil') }}"><span style="color: blue;" class="uk-margin-small-right" uk-icon="icon: info"></span>Mi Perfil</a></li>
                    @if(Auth::User()->rol == 'enlace')
                        <li><a href="{{ route('reporteDate') }}"><span style="color: #F8D775;" class="uk-margin-small-right" uk-icon="icon: folder"></span>Reporte Quincenal</a></li>
                    @endif
                    @if(Auth::User()->rol == 'coordinador' or Auth::User()->rol === 'administrador')
                        <li><a href="{{ route('createColaborador') }}"><span style="color: green;" class="uk-margin-small-right" uk-icon="icon: plus"></span>Agregar un nuevo Colaborador</a></li>
                    @endif
                    @if(Auth::User()->check_in === 1)
                        <li><a href="{{ route('createCheckOut') }}"><span style="color: red;" class="uk-margin-small-right" uk-icon="icon: sign-out"></span>Cerrar Sesión</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
     @endif

</nav>