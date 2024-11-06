@extends('layout.home')

@section('content')

                        <style>
                            table, th, td {
                            border: 1px solid black;
                            }
                        </style>

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
            <form onsubmit="return changeDate()">
                <th>Fecha inicio:<input type="date" placeholder="Inicio" id="inicio" name="inicio" value="{{ $inicio }}" min="2018-10-08"></th>
                <th>Fecha fin:<input type="date" placeholder="Fin" id="fin" name="fin" value="{{ $fin }}" max="{{ \Carbon\Carbon::now()->format('d-m-Y') }}"></th>
                <th><button type="submit" id="send" name="send" class="button_back">Filtrar</button></th>
            </form>
            <div id="invoice" style="padding: 10px 10px;">
                @if(Auth::User()->rol === 'enlace')
                <div id="reportes">
                    
                    <table border="1" id="reportesOLD" style="width: 100%; font-size: 0.75vw; empty-cells: show;">
                        
                            <caption style="margin: 5px; color: black; font-weight: bold;">Reporte de Actividades</caption><br>
                            <caption style="margin: 5px; color: black; font-weight: bold; background-color: #ddc9a3">Datos Generales</caption><br>
                                <tr style="background-color: #ededed;">
                                    <td style='color: black; font-weight: bold;'>Nombre del Programa:</td>
                                    <td colspan="4">Trato Digno y de Calidad en las Salas de Espera de Urgencias en las Unidades de Segundo y Tercer Nivel de Atención</td>
                                </tr>
                                <tr style="height: 24px;"><td colspan="5"></td></tr>
                                <tr style="background-color: #ededed;">
                                    <td style='color: black; font-weight: bold;'>Nombre de Prestador de Servicio:</td>
                                    <td id="enlace">{{Auth::user()->name}} {{Auth::user()->apellido}}</td>
                                    <td colspan="2" style='color: black; font-weight: bold;'>Número Telefónico</td>
                                    <td>{{Auth::user()->telefono}}</td>

                                </tr>
                                <tr>
                                    <td style='color: black; font-weight: bold;'>Tipo de Prestador de Servicio:</td>
                                    <td>{{Auth::user()->rol}}</td>
                                    <td colspan="2" style='color: black; font-weight: bold;'>Correo Electrónico:</td>
                                    <td>{{Auth::user()->email}}</td>
                                </tr>
                                <tr style="background-color: #ededed;">
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
                                    <td colspan="2" style='color: black; font-weight: bold;'>Horario de Servicio:</td>
                                    <td>{{Auth::user()->dias_laborales}}</td>
                                    
                                </tr>
                                <tr>
                                    <td style='color: black; font-weight: bold;'>Periodo del Reporte:</td>
                                    <td>{{ $inicio }} al {{ $fin }}</td>
                                    <td colspan="2" style='color: black; font-weight: bold;'>Nombre del Subcoordinador:</td>
                                    @if (Auth::user()->subcordinador_id == 7)
                                        <td class="textTransform">Monica Peláez</td>
                                    @elseif (Auth::user()->subcordinador_id == 7)
                                        <td class="textTransform">Monica Peláez</td>
                                    @endif
                                    <tr style="height: 24px;"><td colspan="5"></td></tr>
                                </tr>
                                @if (Auth::user()->hospital_id == 1)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. 1° DE OCTUBRE</td>
                                    @elseif (Auth::user()->hospital_id == 2)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.G. DR. FERNANDO QUIROZ GUTIÉRREZ</td>
                                    @elseif (Auth::user()->hospital_id == 3)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.G. DR. DARÍO FERNÁNDEZ FIERRO</td>
                                    @elseif (Auth::user()->hospital_id == 4)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. GRAL. IGNACIO ZARAGOZA</td>
                                    @elseif (Auth::user()->hospital_id == 5)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.G. GRAL. JOSÉ MARÍA MORELOS Y PAVÓN</td>
                                    @elseif (Auth::user()->hospital_id == 6)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">CENTRO MÉDICO NACIONAL 20 DE NOVIEMBRE</td>
                                    @elseif (Auth::user()->hospital_id == 7)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. LIC. ADOLFO LÓPEZ MATEOS</td>
                                    @elseif (Auth::user()->hospital_id == 8)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.G. TACUBA</td>
                                    @elseif (Auth::user()->hospital_id == 9)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.A.E. BICENTENARIO DE LA INDEPENDENCIA</td>
                                    @elseif (Auth::user()->hospital_id == 10)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. LEON</td>
                                    @elseif (Auth::user()->hospital_id == 11)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. VALENTIN GOMEZ FARIAS</td>
                                    @elseif (Auth::user()->hospital_id == 12)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. MORELIA</td>
                                    @elseif (Auth::user()->hospital_id == 13)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.A.E. CENTENARIO DE LA REVOLUCION MEXICANA</td>
                                    @elseif (Auth::user()->hospital_id == 14)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. MONTERREY</td>
                                    @elseif (Auth::user()->hospital_id == 15)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. PRESIDENTE BENITO JUAREZ</td>
                                    @elseif (Auth::user()->hospital_id == 16)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. PUEBLA</td>
                                    @elseif (Auth::user()->hospital_id == 17)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. 1° DE OCTUBRE</td>
                                    @elseif (Auth::user()->hospital_id == 18)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.A.E. VERACRUZ</td>
                                    @elseif (Auth::user()->hospital_id == 19)
                                    <td colspan="5" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. MERIDA</td>
                                    @endif

                            
                        
                            
                            <tr>
                                <th style="border: 1px solid black">Actividad</th>
                                <th style="border: 1px solid black">Tarea</th>
                                <th style="border: 1px solid black">Tipo de Actividad</th>
                                <th style="border: 1px solid black">Cantidad</th>
                                <th style="border: 1px solid black">Fecha</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($actividades as $invoice)
                                <tr style="border: 1px solid black">
                                    <td style="border: 1px solid black; width:220px"">{{ $invoice->nombre }}</td>
                                    <td style="border: 1px solid black; width:250px">{{ $invoice->descripcion_actividad }}</td>
                                    <td style="border: 1px solid black; width:280px">{{ $invoice->descripcion_subactividad }}</td>
                                    <td style="border: 1px solid black; width:120px"> {{ $invoice->cantidad }}</td>
                                    <td style="border: 1px solid black; width:200px">{{ $invoice->fecha }}</td>



                                </tr>
                            @endforeach
                            </tbody>
                        </table>

<!--
                        <table border="1" id="reportesOLD" style="width: 100%; font-size: 0.6vw; empty-cells: show; text-align: center;">
                            <caption style="margin: 5px; color: black; font-weight: bold;">Bitácora de Registro</caption><br>
                            
                            <tr>
                                <td colspan="1">Día</td>
                                <td colspan="1">1</td>
                                <td colspan="2">2</td>
                                <td colspan="2">3</td>
                                <td colspan="1">4</td>
                                <td colspan="1">5</td>
                                <td colspan="1">6</td>
                                <td colspan="1">7</td>
                                <td colspan="1">8</td>
                                <td colspan="1">9</td>
                                <td colspan="2">10</td>
                                <td colspan="3">11</td>
                                <td colspan="3">12</td>
                                <td colspan="3">13</td>
                                <td colspan="3">14</td>
                                <td colspan="1">15</td>
                                <td colspan="1">16</td>
                            </tr>
                            <tr>
                                <td colspan="1">E</td>
                                <td colspan="1">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="2">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="2">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="1">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="1">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="1">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="1">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="1">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="1">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="2">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="3">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="3">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="3">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="3">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="1">{{Auth::user()->horario_entrada}}</td>
                                <td colspan="1">{{Auth::user()->horario_entrada}}</td>
                                
                            </tr>
                            <tr>
                                <td colspan="1">S</td>
                                <td colspan="1">{{Auth::user()->horario_salida}}</td>
                                <td colspan="2">{{Auth::user()->horario_salida}}</td>
                                <td colspan="2">{{Auth::user()->horario_salida}}</td>
                                <td colspan="1">{{Auth::user()->horario_salida}}</td>
                                <td colspan="1">{{Auth::user()->horario_salida}}</td>
                                <td colspan="1">{{Auth::user()->horario_salida}}</td>
                                <td colspan="1">{{Auth::user()->horario_salida}}</td>
                                <td colspan="1">{{Auth::user()->horario_salida}}</td>
                                <td colspan="1">{{Auth::user()->horario_salida}}</td>
                                <td colspan="2">{{Auth::user()->horario_salida}}</td>
                                <td colspan="3">{{Auth::user()->horario_salida}}</td>
                                <td colspan="3">{{Auth::user()->horario_salida}}</td>
                                <td colspan="3">{{Auth::user()->horario_salida}}</td>
                                <td colspan="3">{{Auth::user()->horario_salida}}</td>
                                <td colspan="1">{{Auth::user()->horario_salida}}</td>
                                <td colspan="1">{{Auth::user()->horario_salida}}</td>
                            </tr>
                            
                            <tr>

                                @if (Auth::user()->hospital_id == 1)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. 1° DE OCTUBRE</td>
                                @elseif (Auth::user()->hospital_id == 2)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.G. DR. FERNANDO QUIROZ GUTIÉRREZ</td>
                                @elseif (Auth::user()->hospital_id == 3)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.G. DR. DARÍO FERNÁNDEZ FIERRO</td>
                                @elseif (Auth::user()->hospital_id == 4)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. GRAL. IGNACIO ZARAGOZA</td>
                                @elseif (Auth::user()->hospital_id == 5)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.G. GRAL. JOSÉ MARÍA MORELOS Y PAVÓN</td>
                                @elseif (Auth::user()->hospital_id == 6)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">CENTRO MÉDICO NACIONAL 20 DE NOVIEMBRE</td>
                                @elseif (Auth::user()->hospital_id == 7)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. LIC. ADOLFO LÓPEZ MATEOS</td>
                                @elseif (Auth::user()->hospital_id == 8)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.G. TACUBA</td>
                                @elseif (Auth::user()->hospital_id == 9)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.A.E. BICENTENARIO DE LA INDEPENDENCIA</td>
                                @elseif (Auth::user()->hospital_id == 10)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. LEON</td>
                                @elseif (Auth::user()->hospital_id == 11)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. VALENTIN GOMEZ FARIAS</td>
                                @elseif (Auth::user()->hospital_id == 12)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. MORELIA</td>
                                @elseif (Auth::user()->hospital_id == 13)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.A.E. CENTENARIO DE LA REVOLUCION MEXICANA</td>
                                @elseif (Auth::user()->hospital_id == 14)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. MONTERREY</td>
                                @elseif (Auth::user()->hospital_id == 15)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. PRESIDENTE BENITO JUAREZ</td>
                                @elseif (Auth::user()->hospital_id == 16)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. PUEBLA</td>
                                @elseif (Auth::user()->hospital_id == 17)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. 1° DE OCTUBRE</td>
                                @elseif (Auth::user()->hospital_id == 18)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.A.E. VERACRUZ</td>
                                @elseif (Auth::user()->hospital_id == 19)
                                <td colspan="25" style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">H.R. MERIDA</td>
                                @endif
                                <td></td>
                                <td style="background-color: #760a09" colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="9" style="color: black; font-weight: bold; background-color: #ddc9a3">LUNES A DOMINGO</td>
                                <td colspan="16" style="color: black; font-weight: bold; background-color: #ddc9a3">OCTUBRE</td>
                                <td colspan="1"></td>
                                <td colspan="2" style="color: black; font-weight: bold; background-color: #ddc9a3">Método de Análisis</td>
                                
                            </tr>
                            <tr>
                                <td colspan="1" style="color: black; font-weight: bold; background-color: #ddc9a3; block-size: fit-content;">INDICADOR ANEXO TÉCNICO</td>
                                <td colspan="8" style="color: black; font-weight: bold; background-color: #ddc9a3">ACTIVIDADES A DESARROLLAR DE {{Auth::user()->name}} {{Auth::user()->apellido}}</td>
                                <td colspan="1">1</td>
                                <td colspan="1">2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>10</td>
                                <td>11</td>
                                <td>12</td>
                                <td>13</td>
                                <td>14</td>
                                <td>15</td>
                                <td>16</td>
                                <td></td>
                                <td>Método</td>
                                <td>% de Cumplimiento</td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>8</th>
                                <th>9</th>
                                <th>10</th>
                                <th>11</th>
                                <th>12</th>
                                <th>13</th>
                                <th>14</th>
                                <th>15</th>
                                <th>16</th>
                                <th>17</th>
                                <th>18</th>
                                <th>19</th>
                                <th>20</th>
                                <th>21</th>
                                <th>22</th>
                                <th>23</th>
                                <th>24</th>
                                <th>25</th>
                                <th>26</th>
                                <th>27</th>
                                <th>28</th>
                            </tr>
                        </table>

                        <table border="1" id="reportesOLD" style="width: 100%; font-size: 0.6vw; empty-cells: show; text-align: center; margin-top: 12px;">

                        <tr>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                        </tr>

                        </table>
                        -->
                        <table border="1" id="reportesOLD" style="width: 100%; font-size: 0.75vw;">


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
                    <button class="button_back" id="download">Descargar</button>
                </div>


                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
                <script>
                    const enlace = document.getElementById("enlace").innerHTML;

                    window.onload = function(){
                        document.getElementById("download").addEventListener("click", ()=>{
                            const invoice = this.document.getElementById("invoice");
                            // console.log(invoice);
                            // console.log(window);
                            let opt = {
                                margin: .2,
                                filename: `${enlace}`,
                                image: { type: 'jpeg', quality: 1 },
                                html2canvas: { scale: 2 },
                                jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
                            };
                            html2pdf().from(invoice).set(opt).save();
                        })
                    }


                    function changeDate() {
                        var value1 =  document.getElementById("inicio").value,
                            value2 =  document.getElementById("fin").value,
                            base = '{!! route('reporteDate') !!}',
                            url = base+'/'+value1+'/'+value2;

                        window.location.href = url;
                        return false;
                    }

                    
                </script>
            </div>

        </div>
    </div>



@endsection