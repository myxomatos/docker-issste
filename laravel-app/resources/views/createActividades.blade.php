@extends('layout.home')

@section('content')

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebarsub')
        </div>
        <div class="uk-width-expand@m padd_style" style="margin: 150px;">
            <div class="uk-text-center">
                <h2>
                    Crear nueva actividad
                </h2>

            </div>
            <div class="uk-card uk-card-default uk-card-body "style="background: #bc955c">
                <form action="{{route('storeActividades')}}"  method="POST" class="uk-form-stacked">
                    @csrf
                    <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-text-left" uk-grid>
                        <div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select" style="font-size: 18px">Actividad</label>
                                <div class="uk-form-controls">
                                    <select required name="nombre" class="uk-select" id="nombre">
                                        <option selected>Seleccionar</option>
                                    </select>
                                </div>
                            </div>

                            <div class="uk-margin" id="tarea">
                                <label class="uk-form-label" for="form-stacked-select" style="font-size: 18px">Tarea</label>
                                <div class="uk-form-controls">
                                <select required name="descripcion_actividad" class="uk-select" id="descripcion_actividad">
                                        <option selected>Seleccionar</option>
                                    </select>
                                </div>
                            </div>

                            <div class="uk-margin" id="tipAct">
                                <label class="uk-form-label" for="form-stacked-select" style="font-size: 18px">Tipo de Actividad</label>
                                <div class="uk-form-controls">
                                <select required name="descripcion_subactividad" class="uk-select" id="descripcion_subactividad">
                                        <option selected>Seleccionar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin noMostrar" id="visible">
                                <label class="uk-form-label" for="form-stacked-select" style="font-size: 18px">Cantidad</label>
                                <div class="uk-form-controls">
                                    <select name="cantidad" class="uk-select" id="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <script>
                        let subjectObject = {
                            "Otra Actividad":{
                           "Otra Actividad":["Familiares", "Pacientes","Personal de Hospital"],
                        },
                        "ISSSTE Tel": {
                            "Reportar": ["Folio", "Registro de Queja", "Oficios de Solicitud", "Orientación", "Informe de Solicitudes"],
                        },
                        "Orientación": {
                            "Tipo de Orientación": ["Ubicación de Servicios", "Prestaciones", "Trámites", "Procesos"],
                        },
                        "Pláticas": {
                            "Reportar Pláticas": ["Presentación", "Función de Enlace", "Triage" , "Telefonía" , "Internet" , "Estacion de Carga" , "Reglamento" , "Medidas de Seguridad e Higiene"],
                        },
                        "Personal en Turno": {
                            "Personal": ["Médicos en Consulta", "Médico Triage", "Trabajo Social" , "Admisión"],
                        },
                        "Supervisiones": {
                            "Limpieza": ["Consultorio", "Sala de Urgencias", "Sala de Espera", "Sanitarios"],
                            "Mantenimiento": ["Eléctrico", "Fontanería", "Luminaria", "Mantenimiento en General", "Pintura"],
                            "Silla de Ruedas": ["Conteo"],
                            "Vigilancia": ["Observaciones"],

                        },
                        "Voceo": {
                            "Reportar Voceo": ["Familiares", "Pacientes"],
                        },
                        }
                        window.onload = function() {
                        const nombreSel = document.getElementById("nombre");
                        const actSel = document.getElementById("descripcion_actividad");
                        const subSel = document.getElementById("descripcion_subactividad");
                        for (let x in subjectObject) {
                            nombreSel.options[nombreSel.options.length] = new Option(x, x);
                        }
                        nombreSel.onchange = function() {
                            //empty Chapters- and Topics- dropdowns
                            subSel.length = 1;
                            actSel.length = 1;
                            //display correct values
                            for (let y in subjectObject[this.value]) {
                            actSel.options[actSel.options.length] = new Option(y, y);
                            }
                        }
                        actSel.onchange = function() {
                            //empty Chapters dropdown
                            subSel.length = 1;
                            //display correct values
                            let z = subjectObject[nombreSel.value][this.value];
                            for (let i = 0; i < z.length; i++) {
                            subSel.options[subSel.options.length] = new Option(z[i], z[i]);
                            }
                        }
                        }
                        </script>
                        <script>
                            $('#descripcion_subactividad').change(function(){
                                if($(this).val() == 'Médicos en Consulta') { // or this.value == 'volvo'
                                    // alert('this option is selected');
                                    $("#visible").removeClass("noMostrar");
                                }
                                if($(this).val() == 'Médico Triage') { // or this.value == 'volvo'
                                    // alert('this option is selected');
                                    $("#visible").removeClass("noMostrar");
                                }
                                if($(this).val() == 'Trabajo Social') { // or this.value == 'volvo'
                                    // alert('this option is selected');
                                    $("#visible").removeClass("noMostrar");
                                }
                                if($(this).val() == 'Admisión') { // or this.value == 'volvo'
                                    // alert('this option is selected');
                                    $("#visible").removeClass("noMostrar");
                                }
                            });
                        </script>

                        <style>
                            .noMostrar {
                                display: none
                            }
                        </style>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text" style="font-size: 18px">Notas</label>
                            <div class="uk-margin uk-form-width-large">
                            <textarea name="notas" class="uk-textarea" rows="5" placeholder="Notas o comentarios"></textarea>
                            </div>
                            <div class="uk-form-controls uk-hidden">
                                <select required name="status" class="uk-select" id="form-stacked-select">
                                    <option value="pendiente">Pendiente</option>
                                </select>
                            </div>
                            @if(Auth::User()->rol === 'general')
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="form-stacked-select" style="font-size: 18px">Nombre del Usuario</label>
                                    <div class="uk-form-controls">
                                        <select required name="nombre_usuario" class="uk-select" id="nombre">
                                            @foreach($usuarios as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }} {{ $user->apellido }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            @else
                                <div class="uk-margin uk-form-width-large uk-hidden">
                                    <input value="{{ $user->id }}" name="nombre_usuario" class="uk-textarea" rows="5" placeholder="Escribir notas"></input>
                                </div>
                            @endif

                            <div class="uk-margin uk-text-center uk-margin-medium-top">
                            <a href="{{ route('homeIndexPanel') }}">
                                <button type="button" class="button_back"style="width: 150px;height: 30px">
                                Cancelar
                                </button>
                            </a>
                                <button type="submit" class="button_back"style="width: 150px;height: 30px">
                                    Crear actividad
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
