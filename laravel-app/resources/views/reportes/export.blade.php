@extends('layout.home')

@section('content')


    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>
        
        <div class="uk-width-expand@m padd_style">
        <a href="{{ route('homeIndexPanel') }}">
                        <button class="uk-margin-medium-left button_back" style="float: right;margin: 0px 40px 0px 0px">
                            Volver
                        </button>
                    </a>
            <div class="uk-text-center">
                <h2>
                    Reporte
                </h2>

            </div>
            <div class="uk-card uk-card-default uk-card-body">
                <form onsubmit="return changeDate()">
                    <th>Fecha inicio:<input type="date" placeholder="Inicio" id="inicio" name="inicio" value="{{ $inicio }}" min="2018-10-08"></th>
                    <th>Fecha fin:<input type="date" placeholder="Fin" id="fin" name="fin" value="{{ $fin }}" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"></th>
                    <th><button type="submit" id="send" name="send" class="button_back">Filtrar</button></th>
                </form>
                @if(Auth::User()->rol === 'enlace')
                <div id="reportes">
                    
                    <table border="1" id="reportesOLD" style="width: 100%">
                        
                            <caption style="margin: 30px">Reporte de Actividades</caption><br>
                                <tr>
                                    <td style='color: black; font-weight: bold;'>Nombre del Programa:</td>
                                    <td>Trato Digno y de Calidad en las Salas de Espera de Urgencias en las Unidades de Segundo y Tercer Nivel de Atención</td>
                                </tr>
                                <tr>
                                    <td style='color: black; font-weight: bold;'>Nombre de Prestador de Servicio:</td>
                                    <td>{{Auth::user()->name}} {{Auth::user()->apellido}}</td>
                                    <td style='color: black; font-weight: bold;'>Número Telefónico</td>
                                    <td>{{Auth::user()->telefono}}</td>

                                </tr>
                                <tr>
                                    <td style='color: black; font-weight: bold;'>Tipo de Prestador de Servicio:</td>
                                    <td>{{Auth::user()->rol}}</td>
                                    <td style='color: black; font-weight: bold;'>Correo Electrónico:</td>
                                    <td>{{Auth::user()->email}}</td>
                                </tr>
                                <tr>
                                    <td style='color: black; font-weight: bold;'>Unidad Médica de Adscripción:</td>
                                    @if (Auth::user()->hospital_id == 1)
                                    <td class="textTransform">H.R. 1° DE OCTUBRE</td>
                                    @elseif (Auth::user()->hospital_id == 2)
                                    <td class="textTransform">H.G. DR. FERNANDO QUIROZ GUTIÉRREZ</td>
                                    @elseif (Auth::user()->hospital_id == 3)
                                    <td class="textTransform">H.G. DR. DARÍO FERNÁNDEZ FIERRO</td>
                                    @elseif (Auth::user()->hospital_id == 4)
                                    <td class="textTransform">H.R. GRAL. IGNACIO ZARAGOZA</td>
                                    @elseif (Auth::user()->hospital_id == 5)
                                    <td class="textTransform">H.G. GRAL. JOSÉ MARÍA MORELOS Y PAVÓN</td>
                                    @elseif (Auth::user()->hospital_id == 6)
                                    <td class="textTransform">CENTRO MÉDICO NACIONAL 20 DE NOVIEMBRE</td>
                                    @elseif (Auth::user()->hospital_id == 7)
                                    <td class="textTransform">H.R. LIC. ADOLFO LÓPEZ MATEOS</td>
                                    @elseif (Auth::user()->hospital_id == 8)
                                    <td class="textTransform">H.G. TACUBA</td>
                                    @elseif (Auth::user()->hospital_id == 9)
                                    <td class="textTransform">H.A.E. BICENTENARIO DE LA INDEPENDENCIA</td>
                                    @elseif (Auth::user()->hospital_id == 10)
                                    <td class="textTransform">H.R. LEON</td>
                                    @elseif (Auth::user()->hospital_id == 11)
                                    <td class="textTransform">H.R. VALENTIN GOMEZ FARIAS</td>
                                    @elseif (Auth::user()->hospital_id == 12)
                                    <td class="textTransform">H.R. MORELIA</td>
                                    @elseif (Auth::user()->hospital_id == 13)
                                    <td class="textTransform">H.A.E. CENTENARIO DE LA REVOLUCION MEXICANA</td>
                                    @elseif (Auth::user()->hospital_id == 14)
                                    <td class="textTransform">H.R. MONTERREY</td>
                                    @elseif (Auth::user()->hospital_id == 15)
                                    <td class="textTransform">H.R. PRESIDENTE BENITO JUAREZ</td>
                                    @elseif (Auth::user()->hospital_id == 16)
                                    <td class="textTransform">H.R. PUEBLA</td>
                                    @elseif (Auth::user()->hospital_id == 17)
                                        <td class="textTransform">H.R. DR. MANUEL CARDENAS DE LA VEGA</td>
                                    @elseif (Auth::user()->hospital_id == 18)
                                        <td class="textTransform">H.A.E. VERACRUZ</td>
                                    @elseif (Auth::user()->hospital_id == 19)
                                        <td class="textTransform">H.R. MERIDA</td>
                                    @endif
                                    <td style='color: black; font-weight: bold;'>Horario de Servicio:</td>
                                    <td>{{Auth::user()->dias_laborales}}</td>
                                    
                                </tr>
                                <tr>
                                    <td style='color: black; font-weight: bold;'>Periodo del Reporte:</td>
                                    <td>{{ $inicio }} al {{ $fin }}</td>
                                    <td style='color: black; font-weight: bold;'>Nombre del Subcoordinador:</td>
                                    @if (Auth::user()->subcordinador_id == 7)
                                        <td class="textTransform">Monica Peláez</td>
                                    @elseif (Auth::user()->subcordinador_id == 7)
                                        <td class="textTransform">Monica Peláez</td>
                                    @endif 
                                </tr>    
                            

                            
                        
                            
                            <tr>
                                <th style="border: 1px solid black">Actividad</th>
                                <th style="border: 1px solid black">Subactividad</th>
                                <th style="border: 1px solid black">Subactividad</th>
                                <th style="border: 1px solid black">Cantidad</th>
                                <th style="border: 1px solid black">Fecha</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($actividades as $invoice)
                                <tr style="border: 1px solid black">
                                    <td style="border: 1px solid black">{{ $invoice->nombre }}</td>
                                    <td style="border: 1px solid black">{{ $invoice->descripcion_actividad }}</td>
                                    <td style="border: 1px solid black">{{ $invoice->descripcion_subactividad }}</td>
                                    <td style="border: 1px solid black"> {{ $invoice->cantidad }}</td>
                                    <td style="border: 1px solid black">{{ $invoice->fecha }}</td>



                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <table border="1" id="reportesOLD" style="width: 100%">


                            <thead>
                            <tr>
                                <th style="border: 1px solid black">
                                    Incidencias
                                </th>
                            </tr>
                            <tr>
                                <th style="border: 1px solid black">Incidencia</th>
                                <th style="border: 1px solid black">Status</th>
                                <th style="border: 1px solid black">Creado por</th>
                                <th style="border: 1px solid black">Asignacion</th>
                                <th style="border: 1px solid black">Hospital</th>
                                <th style="border: 1px solid black">Comentarios</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($incidencias as $in)
                                <tr style="border: 1px solid black">
                                    <td style="border: 1px solid black">{{ $in->nombre }}</td>
                                    <td style="border: 1px solid black">{{ $in->status }}</td>
                                    <td style="border: 1px solid black"> {{ $in->name }}</td>
                                    <td style="border: 1px solid black">{{ $in->asignacion }}</td>
                                    <td style="border: 1px solid black">{{ $in->hospital }}</td>
                                    <td style="border: 1px solid black">{{ $in->comentario }}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>

                @endif
                @if(Auth::User()->rol === 'subcoordinador')
                    <div id="reportes">
                        <table border="1" id="reportesOLD" style="width: 100%">
                            Reporte del {{ $inicio }} al {{ $fin }} <br>

                            Nombre: {{Auth::user()->name}} {{Auth::user()->apellido}}

                            <thead>
                            <tr class="uk-hidden">
                                <th style="border: 1px solid black">Nombre: {{Auth::user()->name}} {{Auth::user()->apellido}}</th>
                            </tr>
                            <tr class="uk-hidden">
                                <th style="border: 1px solid black">Reporte del {{ $inicio }} al {{ $fin }} <br></th>
                            </tr>
                            <tr>
                                <th style="border: 1px solid black">Actividad</th>
                                <th style="border: 1px solid black">Subactividad</th>
                                <th style="border: 1px solid black">Tipo Subactividad</th>
                                <th style="border: 1px solid black">Cantidad</th>
                                <th style="border: 1px solid black">Fecha</th>
                                <th style="border: 1px solid black">Nombre</th>
                                <th style="border: 1px solid black">Hospital</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($actividades as $invoice)
                                <tr style="border: 1px solid black">
                                    <td style="border: 1px solid black">{{ $invoice->nombre }}</td>
                                    <td style="border: 1px solid black">{{ $invoice->descripcion_actividad }}</td>
                                    <td style="border: 1px solid black">{{ $invoice->descripcion_subactividad }}</td>
                                    <td style="border: 1px solid black"> {{ $invoice->cantidad }}</td>
                                    <td style="border: 1px solid black">{{ $invoice->fecha }}</td>
                                    <td style="border: 1px solid black">{{ $invoice->enlace }} {{ $invoice->apellidoEnlace }}</td>
                                    <td style="border: 1px solid black">{{ $invoice->hospital }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <table border="1" id="reportesa" style="width: 100%">


                            <thead>
                            <tr>
                                <th style="border: 1px solid black">
                                    Incidencias
                                </th>
                            </tr>
                            <tr>
                                <th style="border: 1px solid black">Incidencia</th>
                                <th style="border: 1px solid black">Status</th>
                                <th style="border: 1px solid black">Creado por</th>
                                <th style="border: 1px solid black">Asignacion</th>
                                <th style="border: 1px solid black">Hospital</th>
                                <th style="border: 1px solid black">Comentarios</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($incidencias as $in)
                                <tr style="border: 1px solid black">
                                    <td style="border: 1px solid black">{{ $in->nombre }}</td>
                                    <td style="border: 1px solid black">{{ $in->status }}</td>
                                    <td style="border: 1px solid black"> {{ $in->name }}</td>
                                    <td style="border: 1px solid black">{{ $in->asignacion }}</td>
                                    <td style="border: 1px solid black">{{ $in->hospital }}</td>
                                    <td style="border: 1px solid black">{{ $in->comentario }}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>

                @endif
                @if(Auth::User()->rol === 'coordinador')
                <div id="reportes">
                    <table border="1" id="reportesa" style="width: 100%">
                        Actividades<br>
                        Reporte del {{ $inicio }} al {{ $fin }} <br>

                        Nombre: {{Auth::user()->name}} {{Auth::user()->apellido}}

                        <thead>
                        <tr class="uk-hidden">
                            <th style="border: 1px solid black">Nombre: {{Auth::user()->name}} {{Auth::user()->apellido}}</th>
                        </tr>
                        <tr class="uk-hidden">
                            <th style="border: 1px solid black">Reporte del {{ $inicio }} al {{ $fin }} <br></th>
                        </tr>
                        <tr>
                            <th style="border: 1px solid black">
                                Actividades
                            </th>
                        </tr>
                        <tr>
                            <th style="border: 1px solid black">Actividad</th>
                            <th style="border: 1px solid black">Subactividad</th>
                            <th style="border: 1px solid black">Cantidad</th>
                            <th style="border: 1px solid black">Fecha</th>
                            <th style="border: 1px solid black">Hospital</th>
                            <th style="border: 1px solid black">Nombre</th>
                            <th style="border: 1px solid black">Rol</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($actividades as $invoice)
                            <tr style="border: 1px solid black">
                                <td style="border: 1px solid black">{{ $invoice->nombre }}</td>
                                <td style="border: 1px solid black">{{ $invoice->descripcion_actividad }}</td>
                                <td style="border: 1px solid black"> {{ $invoice->cantidad }}</td>
                                <td style="border: 1px solid black">{{ $invoice->fecha }}</td>
                                <td style="border: 1px solid black">{{ $invoice->hospital }}</td>
                                <td style="border: 1px solid black">{{ $invoice->enlace }} {{ $invoice->apellidoEnlace }}</td>
                                <td style="border: 1px solid black;text-transform: capitalize">{{ $invoice->rol }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                    <table border="1" id="reportesa" style="width: 100%">


                        <thead>
                            <tr>
                                <th style="border: 1px solid black">
                                    Incidencias
                                </th>
                            </tr>
                        <tr>
                            <th style="border: 1px solid black">Incidencia</th>
                            <th style="border: 1px solid black">Status</th>
                            <th style="border: 1px solid black">Creado por</th>
                            <th style="border: 1px solid black">Asignacion</th>
                            <th style="border: 1px solid black">Hospital</th>
                            <th style="border: 1px solid black">Comentarios</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($incidencias as $in)
                            <tr style="border: 1px solid black">
                                <td style="border: 1px solid black">{{ $in->nombre }}</td>
                                <td style="border: 1px solid black">{{ $in->status }}</td>
                                <td style="border: 1px solid black"> {{ $in->name }}</td>
                                <td style="border: 1px solid black">{{ $in->asignacion }}</td>
                                <td style="border: 1px solid black">{{ $in->hospital }}</td>
                                <td style="border: 1px solid black">{{ $in->comentario }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

                @endif
                <div class="uk-text-center uk-margin-top">
                    <button class="button_back" onclick="exportTableToExcel('reportes')">Descargar</button>
                </div>



                <script>
                    function changeDate() {
                        var value1 =  document.getElementById("inicio").value,
                            value2 =  document.getElementById("fin").value,
                            base = '{!! route('reporteDate') !!}',
                            url = base+'/'+value1+'/'+value2;

                        window.location.href = url;
                        return false;
                    }

                    function exportTableToExcel(tableID, filename = 'Reportes'){
                        var downloadLink;
                        var dataType = 'application/vnd.ms-excel; charset=UTF-8';
                        var tableSelect = document.getElementById(tableID);
                        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

                        // Specify file name
                        filename = filename?filename+'.xls':'excel_data.xls';

                        // Create download link element
                        downloadLink = document.createElement("a");

                        document.body.appendChild(downloadLink);

                        if(navigator.msSaveOrOpenBlob){
                            var blob = new Blob(['\ufeff', tableHTML], {
                                type: dataType
                            });
                            navigator.msSaveOrOpenBlob( blob, filename);
                        }else{
                            // Create a link to the file
                            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                            // Setting the file name
                            downloadLink.download = filename;

                            //triggering the function
                            downloadLink.click();
                        }
                    }
                </script>
            </div>

        </div>
    </div>



@endsection