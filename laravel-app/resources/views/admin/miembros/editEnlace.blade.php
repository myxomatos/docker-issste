@extends('layout.home')

@section('content')

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>
        <div class="uk-width-expand@m padd_style">
            <div class="uk-text-center">
                <h2>
                    Edición del Colaborador
                </h2>

            </div>
            <div class="uk-card uk-card-default uk-card-body "style="margin: 14px;">

                <form  method="POST" action="{{ route('updateEnlace',[$enlace->id]) }}" class="uk-form-stacked">
                    @csrf
                    <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-text-left" uk-grid>
                        <div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Nombre *</label>
                                <div class="uk-form-controls">
                                    <input value="{{ $enlace->name }}" required name="nombre" class="uk-input" id="form-stacked-text" type="text" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Apellidos *</label>
                                <div class="uk-form-controls">
                                    <input value="{{ $enlace->apellido }}"  required name="apellidos" class="uk-input" id="form-stacked-text" type="text" placeholder="Apellidos">
                                </div>
                            </div>



                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Rol *</label>
                                <div class="uk-form-controls">
                                    <select required name="rol" class="uk-select" id="search">
                                        <option value="{{ $enlace->rol }}" style="text-transform: capitalize;">{{ $enlace->rol }}</option>

                                        <option value="subcoordinador">Subcoordinador</option>
                                        <option value="coordinador">Coordinador</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Email *</label>
                                <div class="uk-form-controls">
                                    <input value="{{ $enlace->email }}" required name="email" class="uk-input" id="form-stacked-text" type="text" placeholder="correo@ejemplo">
                                </div>
                            </div>
                        </div>

                        <div>

                        <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Turno *</label>
                                <div class="uk-form-controls">
                                    <select required name="turno" class="uk-select" id="search">
                                        <option value="{{ $enlace->turno }}" style="text-transform: capitalize;">{{ $enlace->turno }}</option>

                                        <option value="MATUTINO">MATUTINO</option>
                                        <option value="VESPERTINO">VESPERTINO</option>
                                        <option value="SABADOS,DOMINGOS Y DIAS FESTIVOS">SABADOS,DOMINGOS Y DIAS FESTIVOS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Hospital *</label>
                                <div class="uk-form-controls">
                                    <select required name="hospital" class="uk-select" id="form-stacked-select">
                                      <option value="{{ $enlace->hospital_id }}">{{ $enlace->hospitales->nombre }}</option>
                                        @foreach($hospitales as $h)
                                            <option value="{{ $h->id }}">{{ $h->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="enlace" class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Subcoordinador</label>
                                <div class="uk-form-controls">
                                    <select required name="subcoordinador" class="uk-select" id="form-stacked-select">
                                        @foreach($enlaceSubcordinador as $sub)
                                            <option value="{{ $sub->idSubcoordinador }}">{{ $sub->subcoordinador }}</option>
                                        @endforeach

                                        @foreach($subcoordinador as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} {{ $item->apellidos }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Cambiar Contraseña *</label>
                                <div class="uk-form-controls">
                                    <input required name="password" class="uk-input" id="form-stacked-text" type="password" placeholder="Contraseña">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-text-left" uk-grid>
                        <div>
                            <div class="uk-margin  uk-margin-medium-top" style="text-align: right">
                                <a href="{{ route('enlacesIndex') }}">
                                    <span class="button_back"style="padding: 1px 38px 6px 38px;">
                                        Cancelar
                                    </span>
                                </a>

                            </div>
                        </div>
                        <div>
                            <div class="uk-margin uk-margin-medium-top"style="text-align: left">
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


