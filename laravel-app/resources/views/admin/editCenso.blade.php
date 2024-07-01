@extends('layout.home')

@section('content')

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>
        <div class="uk-width-expand@m padd_style">
            <div class="uk-text-center">
                <h2>
                   Editar registro
                </h2>

            </div>
            <div class="uk-card uk-card-default uk-card-body "style="background: #bc955c">
            <div class="uk-text-center uk-margin-medium">
                    <a href="{{ route('indexCensos') }}">
                        <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                            Volver
                        </button>
                    </a>

                </div>
                <form  method="POST" action="{{ route('updateCenso',[$censo->id]) }}" class="uk-form-stacked">
                    @csrf
                    <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-text-left" uk-grid>
                        <div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Nombre *</label>
                                <div class="uk-form-controls">
                                    <input value="{{ $censo->nombre }}" required name="nombre" class="uk-input" id="form-stacked-text" type="text" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Apellidos *</label>
                                <div class="uk-form-controls">
                                    <input  value="{{ $censo->apellidos }}" required name="apellidos" class="uk-input" id="form-stacked-text" type="text" placeholder="Apellidos">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-form-label">Género</div>
                                <div class="uk-form-controls">
                                    @if($censo->genero == 'hombre')
                                        <label><input class="uk-radio" type="radio" value="hombre" checked name="genero"> Hombre</label><br>
                                     @else
                                        <label><input class="uk-radio" type="radio" value="hombre" checked name="genero"> Hombre</label><br>
                                      @endif

                                        @if($censo->genero == 'mujer')
                                            <label><input class="uk-radio" type="radio" value="mujer" checked name="genero"> Mujer</label>
                                        @else
                                            <label><input class="uk-radio" type="radio" value="mujer" name="genero"> Mujer</label>
                                        @endif


                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Fecha de nacimiento</label>
                                <div class="uk-form-controls">
                                    <input  value="{{ $censo->edad }}" name="edad" class="uk-input" id="form-stacked-text" type="date" placeholder="Edad">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Tipo Derechohabiente *</label>
                                <div class="uk-form-controls">
                                    <select required name="tipo_derechohabiente" class="uk-select" id="form-stacked-select">
                                        <option value="{{ $censo->tipo_derechohabiente }}">{{ $censo->tipo_derechohabiente }}</option>
                                        <option value="10-Trabajador">10-Trabajador</option>
                                        <option value="20-Trabajadora">20-Trabajadora</option>
                                        <option value="30-Esposa">30-Esposa</option>
                                        <option value="31-Concubina">31-Concubina</option>
                                        <option value="32-Mujer">32-Mujer</option>
                                        <option value="40-Esposo">40-Esposo</option>
                                        <option value="41-Concubino">41-Concubino</option>
                                        <option value="50-Padre">50-Padre</option>
                                        <option value="51-Abuelo">51-Abuelo</option>
                                        <option value="60-Madre">60-Madre</option>
                                        <option value="61-Abuela">61-Abuela</option>
                                        <option value="70-Hijo">70-Hijo</option>
                                        <option value="71-Hijo de Conyugue">71-Hijo de Conyuge</option>
                                        <option value="90-Pensionado">90-Pensionado</option>
                                        <option value="92-Familiar de pensionado">92-Familiar de pensionado</option>
                                        <option value="95-Asegurado INSABI Masculino">95-Asegurado INSABI Masculino</option>
                                        <option value="96-Asegurado INSABI Femenino">96-Asegurado INSABI Femenino</option>
                                        <option value="97-IMSS Hombre">97-IMSS Hombre</option>
                                        <option value="98-IMSS Mujer">98-IMSS Mujer</option>
                                        <option value="99-No derechohabiente">99-No derechohabiente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Telefono</label>
                                <div class="uk-form-controls">
                                    <input value="{{ $censo->telefono }}" name="telefono" class="uk-input" id="form-stacked-text" type="number" placeholder="Opcional">
                                </div>
                            </div>
                            <div class="uk-margin">
                              <label class="uk-form-label" for="form-stacked-text">Doctor</label>
                               <div class="uk-form-controls">
                                   <input  value="{{ $censo->doctor }}" name="doctor" class="uk-input" id="form-stacked-text" type="text" placeholder="Doctor">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Folio *</label>
                                <div class="uk-form-controls">
                                    <input maxlength="10"  value="{{ $censo->folio }}" required name="folio" class="uk-input" id="form-stacked-text" type="text" placeholder="Folio">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-select">Dato de Salud *</label>
                                <div class="uk-form-controls">
                                    <select required name="dato_salud" class="uk-select" id="form-stacked-select">
                                        <option value="{{ $censo->dato_salud }}">{{ $censo->dato_salud }}</option>
                                        <option value="Valoración">Valoración</option>
                                        <option value="Internamiento">Internamiento</option>
                                        <option value="Egreso a Domicilio">Egreso a Domicilio</option>
                                        <option value="Pasa a Piso">Pasa a Piso</option>
                                        <option value="Quirófano">Quirófano</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Fecha de Ingreso</label>
                                <div class="uk-form-controls">
                                    <input  onfocus="(this.type='date')"  value="{{ $censo->created_at }}" required name="fecha_ingreso" class="uk-input" id="form-stacked-text" type="text" placeholder="date">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Diagnóstico</label>
                                <div class="uk-form-controls">
                                    <input value="{{ $censo->diagnostico }}" class="uk-input" name="diagnostico" list="diagnostico-list" placeholder="Escribe un diagnóstico">
                                    <datalist id="diagnostico-list">
                                        @foreach($diagnosticos as $item)
                                            <option>{{ $item->nombre }}</option>
                                        @endforeach
                                    </datalist>
{{--                                    <input required name="diagnostico" class="uk-input" id="form-stacked-text" value="{{ $censo->diagnostico }}" type="text" placeholder="Diagnóstico">--}}
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">RFC *</label>
                                <div class="uk-form-controls">
                                    <input  value="{{ $censo->rfc }}" required name="rfc" class="uk-input" id="form-stacked-text" type="text" placeholder="RFC">
                                </div>
                            </div>

                            <div class="uk-margin" style="display: none;">
                                <label class="uk-form-label" for="form-stacked-select">Hospital *</label>
                                <div class="uk-form-controls">
                                    <select required name="hospital" class="uk-select" id="form-stacked-select">
                                        <option value="{{ $censo->hospitales->id }}">{{ $censo->hospitales->nombre }}</option>
                                        @foreach($hospitales as $h)
                                            <option value="{{ $h->id }}">{{ $h->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Cama *</label>
                                <div class="uk-form-controls">
                                    <input  value="{{ $censo->cama}}" required name="cama" class="uk-input" id="form-stacked-text" type="text" placeholder="Cama">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Estado *</label>
                                <div class="uk-form-controls">
                                    <select required name="status" class="uk-select" id="form-stacked-select">
                                        <option value="{{ $censo->status }}">{{ $censo->status }}</option>
                                        <option value="delicado">Delicado</option>
                                        <option value="muy delicado">Muy Delicado</option>
                                        <option value="grave">Grave</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Tipo Hopitalización *</label>
                                <div class="uk-form-controls">
                                    <select required name="tipo_hospitalizacion" class="uk-select" id="form-stacked-select">
                                        <option value="{{ $censo->tipo_hospitalizacion }}">{{ $censo->tipo_hospitalizacion }}</option>
                                        <option value="Choque">Choque</option>
                                        <option value="Aislado">Aislado</option>
                                        <option value="Cama">Cama</option>
                                        <option value="Camilla">Camilla</option>
                                        <option value="Filtro">Filtro</option>
                                        <option value="Corta_Estancia">Corta_Estancia</option>
                                        <option value="Reposet">Reposet</option>
                                        <option value="Solucion">Solucion</option>
                                        <option value="Silla">Silla</option>
                                        <option value="Banca">Banca</option>
                                        <option value="Pediatria">Pediatria</option>
                                        <option value="Ginecologia">Ginecologia</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-text-left" uk-grid>
                        <div>
                            <div class="uk-margin-medium-top">
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-select">Ingresa un comentario *</label>
                                    <div class="uk-form-controls">
                                        <textarea required name="comentario" class="uk-input" id="form-stacked-text" type="text"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="uk-margin  uk-margin-medium-top">
                                <label class="uk-form-label" for="form-stacked-select">Tipo de Egreso</label>
                                <div class="uk-form-controls">
                                    <select name="tipo_egreso" class="uk-select" id="form-stacked-select">
                                        <option value="{{ $censo->tipo_egreso }}">{{ $censo->tipo_egreso }}</option>
                                        <option value="Pase a piso">Pase a piso</option>
                                        <option value="Alta por mejoría">Alta por mejoría</option>
                                        <option value="Alta voluntaria">Alta voluntaria</option>
                                        <option value="Alta por máximo beneficio">Alta por máximo beneficio</option>
                                        <option value="Quirófano">Quirófano</option>
                                        <option value="Traslado">Traslado</option>
                                        <option value="Defunción">Defunción</option>
                                        <option value="Terapia">Terapia</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-text-left" uk-grid>
                        <div>
                            <div class="uk-margin  uk-margin-medium-top" style="text-align: right">
                                <a href="{{ route('indexCensos') }}">
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



@endsection

