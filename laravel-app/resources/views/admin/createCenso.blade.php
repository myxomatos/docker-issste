@extends('layout.home')

@section('content')

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>
        <div class="uk-width-expand@m padd_style">
            <div class="uk-text-center">
               <h2>
                   Ingresa un paciente nuevo
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
                <form  method="POST" action="{{ route('storeCenso') }}" class="uk-form-stacked">
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
                                <div class="uk-form-label">Género *</div>
                                <div class="uk-form-controls">
                                    <label><input class="uk-radio" type="radio" value="hombre" name="genero"> Hombre</label><br>
                                    <label><input class="uk-radio" type="radio" value="mujer" name="genero"> Mujer</label>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Fecha de nacimiento</label>
                                <div class="uk-form-controls">
                                    <input name="edad" class="uk-input" id="form-stacked-text" type="date" placeholder="Edad">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Tipo Derechohabiente *</label>
                                <div class="uk-form-controls">
                                    <select required name="tipo_derechohabiente" class="uk-select" id="form-stacked-select">
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
                                        <option value="80-Hija">80-Hija</option>
                                        <option value="81-Hija de Conyuge">81-Hija de Conyuge</option>
                                        <option value="90-Pensionado">90-Pensionado</option>
                                        <option value="91-Pensionada">91-Pensionada</option>
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
                                    <input name="telefono" class="uk-input" id="form-stacked-text" type="number" placeholder="Opcional">
                                </div>
                            </div>
                            <!-- <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Nombre de Doctor</label>
                                <div class="uk-form-controls">
                                    <input name="doctor" class="uk-input" id="form-stacked-text" type="text" placeholder="Doctor">
                                </div>
                            </div> -->
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Folio</label>
                                <div class="uk-form-controls">
                                    <input maxlength="10" name="folio" class="uk-input" id="form-stacked-text" type="text" placeholder="Folio">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-select">Dato de Salud</label>
                                <div class="uk-form-controls">
                                    <select required name="dato_salud" class="uk-select" id="form-stacked-select">
                                        <option value="Valoración">Valoración</option>
                                        <option value="Internamiento">Internamiento</option>
                                        <option value="Egreso a Domicilio">Egreso a Domicilio</option>
                                        <option value="Quirófano">Quirófano</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">RFC *</label>
                                <div class="uk-form-controls">
                                <input maxlength="10" required name="rfc" class="uk-input" id="form-stacked-text" type="text" placeholder="RFC">
                                @error('rfc')
                                        <span class="invalid-feedback" role="alert" style="text-transform: uppercase;color: red">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="uk-margin" style="display: none;">
                                <label class="uk-form-label" for="form-stacked-select">Hospital *</label>
                                <div class="uk-form-controls">
                                    <select required name="hospital" class="uk-select" id="form-stacked-select">
                                        
                                            <option value="{{ $user->hospitales->id }}">{{ $user->hospitales->id }}</option>
                                        
                                    </select>
                                </div>
                            </div>


                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Cama *</label>
                                <div class="uk-form-controls">
                                    <input required name="cama" class="uk-input" id="form-stacked-text" type="text" placeholder="Cama">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Estado *</label>
                                <div class="uk-form-controls">
                                    <select required name="status" class="uk-select" id="form-stacked-select">
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
                            <div class="uk-margin uk-text-center uk-margin-medium-top">
                                <a href="{{ route('indexCensos') }}" class="button_back" style="padding: 2px 20px 2px 20px; margin: 20px; text-decoration: none;y">
                                
                                        Cancelar
                                    
                                 </a>
                                <button type="submit" class="button_back">
                                    Guardar
                                </button>
                            </div>

                        </div>
                    </div>



                </form>
            </div>

        </div>
    </div>
    <a style="display: none" class="uk-button uk-button-default" href="#modal-overflow" uk-toggle>Open</a>

<div id="modal-overflow" uk-modal bg-close="false">
    <div class="uk-modal-dialog" >
        <a href="{{ route('homeIndexPanel') }}">
            <button style="float: right;margin: 15px 15px 0px 0px" type="button" uk-close></button>
        </a>

        <div class="uk-modal-header">
            <img src="../../../public/img/Screenshot 2023-05-17 at 22.11.00.png" alt="">
        </div>
        <div class="uk-modal-header">
            <h2 style="font-size: 14px;" class="uk-modal-title text-center">AVISO DE PRIVACIDAD INTEGRAL PARA EL SISTEMA DE REGISTRO DE ACTIVIDADES

DE ENLACES EN SALAS DE URGENCIAS (SIRAESU)</h2>
        </div>

        <div class="uk-modal-body" uk-overflow-auto>

            <h5 style="font-weight: bold;">¿Quiénes somos?</h5>

            <p style="color: #3A3B3C;" class="text-sm">El Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado (ISSSTE), a través de la
Dirección Estratégica de Información, Supervisión y Evaluación (DEISE), con domicilio en Avenida
Jesús García Corona # 140, Colonia Buenavista, Alcaldía Cuauhtémoc, C.P. 06350, Ciudad de México, es
el sujeto obligado y responsable del uso y protección de sus datos personales, los cuales serán
protegidos conforme a lo dispuesto por la Ley General de Protección de Datos Personales en Posesión
de Sujetos Obligados y demás normativa que resulte aplicable.</p>

            <h5 style="font-weight: bold;">¿Para qué fines utilizaremos sus datos personales?</h5>

            <p style="color: #3A3B3C;" class="text-sm">Los datos personales que recabamos de Usted, a través del SIRAESU, cuyo administrador y
responsable es el Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado, los
utilizaremos para asociarlo con el Número de Folio que le es asignado a su ingreso al Servicio de
Urgencias y/o Admisión Continua, del cual se realizará el despliegue oportuno y fidedigno en el
Sistema, acompañado del dato de salud y su hora de actualización, para con ello mantener una
interface de información permanente con sus familiares y/o acompañantes, lo que se traduce en el
fortalecimiento de los vínculos de confianza y credibilidad de la atención médica que se le otorga.</p>

            <h5 style="font-weight: bold;">¿Qué datos personales utilizaremos para estos fines?</h5>

            <p style="color: #3A3B3C;" class="text-sm">Para llevar a cabo las finalidades descritas en el presente aviso de privacidad, utilizaremos los
siguientes datos personales del Paciente en el Servicio de Urgencias y/o Admisión Continua:</p>
            <ul style="color: #3A3B3C;" class="list-disc text-sm">
                <li>Nombre</li>
                <li>Clave Única de Registro de Población (CURP)</li>
                <li>Dato de Salud (Entendido este como el estatus de su atención médica: VALORACIÓN,
INTERNAMIENTO, EGRESO A DOMICILIO o QUIRÓFANO).</li>
            </ul>
            <h5 style="font-weight: bold;">¿Cómo puede acceder, rectificar o cancelar sus datos personales u oponerse a su uso?</h5>

            <p style="color: #3A3B3C;" class="text-sm">Tiene derecho a conocer qué datos personales tenemos de Usted, para qué los utilizamos y las
condiciones del uso que les damos (Acceso).</p>
<p style="color: #3A3B3C;" class="text-sm">Asimismo, es su derecho solicitar la corrección de su información personal en caso de que esté
desactualizada, sea inexacta o incompleta (Rectificación); que la eliminemos de nuestros registros o
bases de datos cuando considere que la misma no está siendo utilizada adecuadamente
(Cancelación); así como oponerse al uso de sus datos personales para fines específicos (Oposición).
Estos derechos se conocen como derechos ARCO.</p>
<p style="color: #3A3B3C;" class="text-sm">La solicitud de derechos ARCO debe ser presentada a través de los medios o ventanillas de atención
señaladas en este aviso de privacidad y debe contener la siguiente información: 1. El nombre y
domicilio del titular o cualquier otro medio para recibir la respuesta (si el titular omite la dirección o
cualquier otro medio que haya elegido para contactarlo, se tendrá por no recibida la solicitud). 2. Los
documentos que acrediten la identidad o la personalidad del titular o su representante. 3. La descripción clara y precisa de los datos personales respecto de los cuales el titular busca ejercer
alguno de los derechos. 4. En su caso, otros elementos o documentos que faciliten la localización de
los datos personales.</p>
            <h5 style="font-weight: bold;">Mecanismos, medios y procedimientos disponibles para ejercer los derechos de Acceso,
Rectificación, Cancelación y Oposición (ARCO).</h5>

            <p style="color: #3A3B3C;" class="text-sm">Para ejercer estos derechos el titular podrá acudir a la Unidad de Transparencia del ISSSTE, con
domicilio en Avenida Jesús García Corona # 140, Planta Baja, Colonia Buenavista, Alcaldía
Cuauhtémoc, C.P. 06350, Ciudad de México o manifestarlo, a través del correo electrónico:
<a style="color: blue;"href="#">unidad.transparencia@issste.gob.mx</a> de la Unidad de Transparencia del ISSSTE, dirigido a su Titular, la
Mtra. Laura Luisa Dorantes Sánchez.</p>
            <h5 style="font-weight: bold;">Transferencia de datos personales.</h5>

            <p style="color: #3A3B3C;" class="text-sm">No se realizarán transferencias de datos personales, salvo aquéllas que sean necesarias para atender
requerimientos de información de una autoridad competente que esté debidamente fundados y
motivados.</p>
            <h5 style="font-weight: bold;">¿Cómo puede conocer los cambios en este aviso de privacidad?</h5>

            <p style="color: #3A3B3C;" class="text-sm">El presente aviso de privacidad puede sufrir cambios o actualizaciones derivadas de las modificaciones
a la normatividad en la materia; de nuestras propias necesidades por los seguros, prestaciones o
servicios que brindamos; de nuestras prácticas de privacidad, o por otras causas. Nos
comprometemos a mantenerlo informado sobre los cambios que pueda sufrir el presente aviso de
privacidad, a través de la liga <a style="color: blue;"href="#">http://www.issste.gob.mx/transparencia/transparenciaaprivacidad.html.</a></p>

        </div>

        <div class="uk-modal-footer uk-text-right">
            <img src="../../../public/img/Screenshot 2023-05-17 at 22.14.22.png" alt="">
            <a href="{{ route('indexCensos') }}">
                <button class="button_back_2" type="button">Cancelar</button>
            </a>

            <button class="button_back uk-modal-close" type="button">Aceptar</button>
        </div>

    </div>
</div>

<script>
UIkit.modal('#modal-overflow').show();
</script>



@endsection

