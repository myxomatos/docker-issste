@extends('layout.home')

@section('content')

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>
        
        <div class="uk-width-expand@m padd_style">
            <div class="uk-text-center">
            <a href="{{ route('homeIndexPanel') }}">
                        <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                            Volver
                        </button>
                </a>
                <h2>
                    Agrega un Colaborador Nuevo
                </h2>
                

            </div>
            
            <div class="uk-card uk-card-default uk-card-body "style="background: #bc955c">
                
                <form  method="POST" action="{{ route('storeColaborador') }}" class="uk-form-stacked">
                    @csrf
                    <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-text-left" uk-grid>
                        <div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Nombre *</label>
                                <div class="uk-form-controls">
                                    <input required name="nombre" class="uk-input" id="form-stacked-text" type="text" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Apellidos *</label>
                                <div class="uk-form-controls">
                                    <input required name="apellidos" class="uk-input" id="form-stacked-text" type="text" placeholder="Apellidos">
                                </div>
                            </div>



                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Rol *</label>
                                <div class="uk-form-controls">
                                    <select required name="rol" class="uk-select" id="search">
                                        <option value="enlace">Enlace</option>
                                        <option value="subcoordinador">Subcoordinador</option>
                                        <option value="coordinador">Coordinador</option>
                                        <option value="coordinador">Coordinador AD</option>
                                        <option value="coordinador">Administrador</option>
                                    </select>
                                </div>
                            </div>
                            <div id="enlace" class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Subcoordinador</label>
                                <div class="uk-form-controls">
                                    <select required name="subcoordinador" class="uk-select" id="form-stacked-select">
                                    @foreach($subcoordinador as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} {{ $item->apellidos }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        

                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Email *</label>
                                <div class="uk-form-controls">
                                    <input required name="email" class="uk-input" id="form-stacked-text" type="text" placeholder="correo@ejemplo">
                                </div>
                            </div>
                            </div>

                            <div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Hospital *</label>
                                <div class="uk-form-controls">
                                    <select required name="hospital" class="uk-select" id="form-stacked-select">
                                        @foreach($hospitales as $h)
                                            <option value="{{ $h->id }}">{{ $h->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-select">Turno *</label>
                                <div class="uk-form-controls">
                                    <select required name="turno" class="uk-select" id="search">
                                        <option value="MATUTINO">Matutino</option>
                                        <option value="VESPERTINO">Vespertino</option>
                                        <option value="NOCTURNO A">Nocturno A</option>
                                        <option value="NOCTURNO B">Nocturno B</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Dias laborales*</label>
                                <div class="uk-form-controls">
                                    <select required name="dias_laborales" class="uk-select" id="search">
                                        <option value="LUNES A VIERNES">Lunes a Viernes</option>
                                        <option value="LUNES A DOMINGO">Lunes a Domingo</option>
                                        <option value="SABADOS, DOMINGOS Y DIAS FESTIVOS">Sabados, Domingos y Dias festivos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Contraseña *</label>
                                <div class="uk-form-controls">
                                    <input required name="password" class="uk-input" id="form-stacked-text" type="password" placeholder="Contraseña">
                                </div>
                            </div>
                            <div class="uk-margin uk-text-center uk-margin-medium-top">
                                <button type="submit" class="button_back"style="width: 150px;height: 30px">
                                    Guardar
                                </button>
                                
                            </div>

                        </div>
                    </div>



                </form>
                
            </div>
            
        </div>
    </div>







    <script>
        $(document).ready(function() {
            $("#search").change(function(e) {
                hideAll();
                $(e.target.options).removeClass();
                var $selectedOption = $(e.target.options[e.target.options.selectedIndex]);
                $selectedOption.addClass('selected');
                $('#' + $selectedOption.val()).show();
            });
        });

        function hideAll() {
            $("#enlace").hide();

        }
    </script>


@endsection


