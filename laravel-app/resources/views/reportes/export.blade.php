@extends('layout.home')

@section('content')


    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>
        <div class="uk-width-expand@m padd_style">
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
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($actividades as $invoice)
                                <tr style="border: 1px solid black">
                                    <td style="border: 1px solid black">{{ $invoice->nombre }}</td>
                                    <td style="border: 1px solid black">{{ $invoice->descripcion_actividad }}</td>
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