<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo logo" href="{{ route('homeIndexPanel') }}"></a>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    @if(\Request::is('home/admin/aeropuerto') )

    @else
        <div id="notify" class="uk-navbar-right welcome" style="color: white">
            @if(Auth::User()->rol === 'subcoordinador')
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
                    <p style="color: white;margin: 0">
                    Bienvenido(a) {{Auth::user()->name}} {{Auth::user()->apellido}}<br>
                    <span style="font-size: 18px; color: gold">
                        
                        Hora de Entrada {{Auth::user()->entrada}}
                    </span>
                        
                    </p>

                @endauth
            @endif

            <button class="uk-button uk-button-default" type="button"style="border: none">
                <span style="color: white" uk-icon="icon:  chevron-down; ratio: 1.5"></span>
            </button>
            <div uk-dropdown="animation: uk-animation-slide-top-small; animate-out: true">
                <ul class="uk-nav uk-dropdown-nav">
                    <li><a href="{{ route('homeIndexPanel') }}">Panel</a></li>
                    <li><a href="{{ route('perfil') }}">Mi Perfil</a></li>
                    @if(Auth::User()->rol !== 'general')
                        <li><a href="{{ route('reporteDate') }}">Reportes</a></li>
                    @endif
                    @if(Auth::User()->rol == 'coordinador')
                        <li><a href="{{ route('createColaborador') }}">Insertar</a></li>
                    @endif
                </ul>
            </div>
            <a href="{{route('logout')}}">
                <button class="uk-button uk-button-default button_in_out">
                    Cerrar Sesión
                </button>
            </a>
        </div>
     @endif

</nav>