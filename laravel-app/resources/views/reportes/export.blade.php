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
            <form style="margin-top: 20px;" onsubmit= "return changeDate()">
                <th>Fecha inicio:<input type="date" placeholder="Inicio" id="inicio" name="inicio"
                        value="{{ $inicio }}" min="2018-10-08"></th>
                <th>Fecha fin:<input type="date" placeholder="Fin" id="fin" name="fin"
                        value="{{ $fin }}" max="{{ \Carbon\Carbon::now()->format('d-m-Y') }}"></th>
                <th><button type="submit" id="send" name="send" class="button_back">Filtrar</button></th>
            </form>
            <div id="reportes">
                <div id="invoice" style="padding: 10px 10px;">
                    @if (Auth::User()->rol === 'enlace')
                        <table style="width: 100%; font-size: 0.75vw; empty-cells: show; border: 1px solid black;">

                            <caption style="margin: 5px; color: black; font-weight: bold;">Reporte de Actividades</caption>
                            <br>
                        
                            <tr style="background-color: #ededed; border: 1px solid black;">
                                <td style='color: black; font-weight: bold; border: 1px solid black;'>Nombre del Programa:
                                </td>
                                <td colspan="4">Trato Digno y de Calidad en las Salas de Espera de Urgencias en las
                                    Unidades de Segundo y Tercer Nivel de Atención</td>
                            </tr>
                            <tr style="height: 24px;">
                                <td colspan="5"></td>
                            </tr>
                            <tr style="background-color: #ededed; border: 1px solid black;">
                                <td style='color: black; font-weight: bold; border: 1px solid black;'>Nombre de Prestador de
                                    Servicio:</td>
                                <td id="enlace" border: 1px solid black;>{{ Auth::user()->name }}
                                    {{ Auth::user()->apellido }}</td>
                                <td colspan="2" style='color: black; font-weight: bold; border: 1px solid black;'>Número
                                    Telefónico</td>
                                <td>{{ Auth::user()->telefono }}</td>

                            </tr>
                            <tr style="border: 1px solid black;">
                                <td style='color: black; font-weight: bold; border: 1px solid black;'>Tipo de Prestador de
                                    Servicio:</td>
                                <td>{{ Auth::user()->rol }}</td>
                                <td colspan="2" style='color: black; font-weight: bold; border: 1px solid black;'>Correo
                                    Electrónico:</td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr style="background-color: #ededed; border: 1px solid black;">
                                <td style='color: black; font-weight: bold; border: 1px solid black;'>Unidad Médica de
                                    Adscripción:</td>
                                @if (Auth::user()->hospital_id == 1)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.R. 1° DE OCTUBRE
                                    </td>
                                @elseif (Auth::user()->hospital_id == 2)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.G. DR. FERNANDO
                                        QUIROZ GUTIÉRREZ</td>
                                @elseif (Auth::user()->hospital_id == 3)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.G. DR. DARÍO
                                        FERNÁNDEZ FIERRO</td>
                                @elseif (Auth::user()->hospital_id == 4)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.R. GRAL. IGNACIO
                                        ZARAGOZA</td>
                                @elseif (Auth::user()->hospital_id == 5)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.G. GRAL. JOSÉ MARÍA
                                        MORELOS Y PAVÓN</td>
                                @elseif (Auth::user()->hospital_id == 6)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">CENTRO MÉDICO
                                        NACIONAL 20 DE NOVIEMBRE</td>
                                @elseif (Auth::user()->hospital_id == 7)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.R. LIC. ADOLFO
                                        LÓPEZ MATEOS</td>
                                @elseif (Auth::user()->hospital_id == 8)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.G. TACUBA</td>
                                @elseif (Auth::user()->hospital_id == 9)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.A.E. BICENTENARIO
                                        DE LA INDEPENDENCIA</td>
                                @elseif (Auth::user()->hospital_id == 10)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.R. LEON</td>
                                @elseif (Auth::user()->hospital_id == 11)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.R. VALENTIN GOMEZ
                                        FARIAS</td>
                                @elseif (Auth::user()->hospital_id == 12)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.R. MORELIA</td>
                                @elseif (Auth::user()->hospital_id == 13)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.A.E. CENTENARIO DE
                                        LA REVOLUCION MEXICANA</td>
                                @elseif (Auth::user()->hospital_id == 14)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.R. MONTERREY</td>
                                @elseif (Auth::user()->hospital_id == 15)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.R. PRESIDENTE
                                        BENITO JUAREZ</td>
                                @elseif (Auth::user()->hospital_id == 16)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.R. PUEBLA</td>
                                @elseif (Auth::user()->hospital_id == 17)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.R. DR. MANUEL
                                        CARDENAS DE LA VEGA</td>
                                @elseif (Auth::user()->hospital_id == 18)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.A.E. VERACRUZ</td>
                                @elseif (Auth::user()->hospital_id == 19)
                                    <td style="color: red; font-weight: bolder;" class="textTransform">H.R. MERIDA</td>
                                @endif
                                <td colspan="2" style='color: black; font-weight: bold; border: 1px solid black;'>Horario
                                    de Servicio:</td>
                                <td>{{ Auth::user()->dias_laborales }}</td>

                            </tr>
                            <tr>
                                <td style='color: black; font-weight: bold; border: 1px solid black;'>Periodo del Reporte:
                                </td>
                                <td>{{ $inicio }} al {{ $fin }}</td>
                                <td colspan="2" style='color: black; font-weight: bold; border: 1px solid black;'>Nombre
                                    del Subcoordinador:</td>
                                @if (Auth::user()->subcordinador_id == 7)
                                    <td class="textTransform">Monica Peláez</td>
                                @elseif (Auth::user()->subcordinador_id == 7)
                                    <td class="textTransform">Monica Peláez</td>
                                @endif
                            </tr>
                        </table>
                        <div style="display: none;" id="movu">{{ $movu }}</div>
                        <div style="display: none;" id="otraA">{{ $otraA }}</div>
                        <div style="display: none;" id="Itel">{{ $Itel }}</div>
                        <div style="display: none;" id="telgra">{{ $telgra }}</div>
                        <div style="display: none;" id="orien">{{ $orien }}</div>
                        <div style="display: none;" id="plat">{{ $plat }}</div>
                        <div style="display: none;" id="perTur">{{ $perTur }}</div>
                        <div style="display: none;" id="superv">{{ $superv }}</div>
                        <div style="display: none;" id="voceo">{{ $voceo }}</div>

                        @foreach ($fechasPeriodo as $f)
                            <div style="display: none;" class="tester">{{ $f }}</div>
                        @endforeach


                        <div style="display: none;" id="testero">{{ $actPeriodo }}</div>
                        <div style="display: none;" id="ncensos">{{ $ncensos }}</div>
                        <div style="display: none;" id="tcensos">{{ $tcensos }}</div>

                        <table border="0" style="width: 100%; margin-top: 40px;">
                            <th colspan="5"
                                style="text-align: center; margin: 5px; color: white; font-weight: bold; background-color: #760a09">
                                Actividades
                            </th>
                            <tr>
                                <td colspan="2">

                                    <div class="max-w-lg w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

                                        <div class="flex justify-between mb-2">
                                            <div class="flex justify-center items-center">
                                                <h5
                                                    class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">
                                                    Total de Actividades</h5>
                                                <svg data-popover-target="chart-info" data-popover-placement="bottom"
                                                    class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                                </svg>
                                                <div data-popover id="chart-info" role="tooltip"
                                                    class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                                    <div class="p-3 space-y-2">
                                                        <h3 class="font-semibold text-gray-900 dark:text-white">
                                                            Activity growth - Incremental</h3>
                                                        <p>Report helps navigate cumulative growth of community
                                                            activities. Ideally, the chart should have a growing trend,
                                                            as stagnating chart signifies a significant decrease of
                                                            community activity.</p>
                                                        <h3 class="font-semibold text-gray-900 dark:text-white">
                                                            Calculation</h3>
                                                        <p>For each date bucket, the all-time volume of activities is
                                                            calculated. This means that activities in period n contain
                                                            all activities up to period n, plus the activities generated
                                                            by your community in period.</p>
                                                        <a href="#"
                                                            class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read
                                                            more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 6 10">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 9 4-4-4-4" />
                                                            </svg></a>
                                                    </div>
                                                    <div data-popper-arrow></div>
                                                </div>
                                            </div>

                                        </div>



                                        <!-- Donut Chart -->
                                        <div class="py-6" id="donut-chart"></div>


                                    </div>


                                <td colspan="3">

                                    <div class="max-w-lg w-full bg-white rounded-lg shadow dark:bg-gray-800">
                                        <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
                                            <div>
                                                <h5
                                                    class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">
                                                    Actividades por Día</h5>
                                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Promedio
                                                    de actividades diarias: <span id="promedio"
                                                        style="color: #6aa84f;"></span></p>
                                            </div>

                                        </div>
                                        <div id="labels-chart" class="px-2.5"></div>

                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <div class="max-w-lg w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                                        <div
                                            class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                                                    <svg class="w-6 h-6 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 19">
                                                        <path
                                                            d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                                                        <path
                                                            d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h5
                                                        class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">
                                                        {{ $ncensos }}</h5>
                                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Censos
                                                        en el Periodo</p>
                                                </div>
                                            </div>

                                        </div>

                                        <div id="column-chart"></div>

                                    </div>


                                </td>
                                <td colspan="3">
                                    <div class="max-w-lg w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                                        <div
                                            class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                                                    <svg class="w-6 h-6 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 19">
                                                        <path
                                                            d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                                                        <path
                                                            d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1"
                                                        id="stringEgr">
                                                    </h5>
                                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Censos
                                                        en el Periodo</p>
                                                </div>
                                            </div>

                                        </div>

                                        <div id="column-chart2"></div>

                                    </div>


                                </td>
                            </tr>


                        </table>

                        <table>
                        
                        </table>


                        <table style="margin-top: 30px;"">


                            <tr>
                                <th style="border: 1px solid black">Actividad</th>
                                <th style="border: 1px solid black">Tarea</th>
                                <th style="border: 1px solid black">Tipo de Actividad</th>
                                <th style="border: 1px solid black">Cantidad</th>
                                <th style="border: 1px solid black">Fecha</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach ($actividades as $invoice)
                                    <tr style="border: 1px solid black">
                                        <td style="border: 1px solid black; width:220px"">{{ $invoice->nombre }}</td>
                                        <td style="border: 1px solid black; width:250px">
                                            {{ $invoice->descripcion_actividad }}</td>
                                        <td style="border: 1px solid black; width:280px">
                                            {{ $invoice->descripcion_subactividad }}</td>
                                        <td style="border: 1px solid black; width:120px"> {{ $invoice->cantidad }}</td>
                                        <td style="border: 1px solid black; width:200px">{{ $invoice->fecha }}</td>



                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

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

                                @foreach ($incidencias as $in)
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

                    window.onload = function() {
                        document.getElementById("download").addEventListener("click", () => {
                            const invoice = this.document.getElementById("invoice");
                            // console.log(invoice);
                            // console.log(window);
                            let opt = {
                                margin: .2,
                                filename: `${enlace}`,
                                image: {
                                    type: 'jpeg',
                                    quality: 1
                                },
                                html2canvas: {
                                    scale: 2
                                },
                                jsPDF: {
                                    unit: 'in',
                                    format: 'letter',
                                    orientation: 'landscape'
                                }
                            };
                            html2pdf().from(invoice).set(opt).save();
                        })
                    }


                    function changeDate() {
                        var value1 = document.getElementById("inicio").value,
                            value2 = document.getElementById("fin").value,
                            base = '{!! route('reporteDate') !!}',
                            url = base + '/' + value1 + '/' + value2;

                        window.location.href = url;
                        return false;



                    }
                </script>
                <script>
                    let movu = document.getElementById("movu").innerHTML;
                    let otraA = document.getElementById("otraA").innerHTML;
                    let Itel = document.getElementById("Itel").innerHTML;
                    let telgra = document.getElementById("telgra").innerHTML;
                    let orien = document.getElementById("orien").innerHTML;
                    let plat = document.getElementById("plat").innerHTML;
                    let perTur = document.getElementById("perTur").innerHTML;
                    let superv = document.getElementById("superv").innerHTML;
                    let voceo = document.getElementById("voceo").innerHTML;



                    const numActividades = (arrayText) => {

                        const arr = JSON.parse(arrayText);

                        const array = arr.reduce((acc, cur) => {
                            const found = acc.find(val => val.fecha === cur.fecha)
                            if (found) {
                                found.cantidad += Number(cur.cantidad)
                            } else {
                                acc.push({
                                    ...cur,
                                    cantidad: Number(cur.cantidad)
                                })
                            }
                            return acc
                        }, [])

                        return array.reduce((n, {
                            cantidad
                        }) => n + cantidad, 0);

                    }

                    const numMovu = numActividades(movu);
                    const numOtraA = numActividades(otraA);
                    const numItel = numActividades(Itel);
                    const numTelgra = numActividades(telgra);
                    const numOrigen = numActividades(orien);
                    const numPlat = numActividades(plat);
                    const numPerTur = numActividades(perTur);
                    const numSuperv = numActividades(superv);
                    const numVoceo = numActividades(voceo);



                    const getChartOptions = () => {
                        return {
                            series: [numMovu, numOtraA, numItel, numTelgra, numOrigen, numPlat, numPerTur, numSuperv, numVoceo],
                            colors: ["#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6d9eeb", "#6fa8dc", "#8e7cc3",
                                "#c27ba0"
                            ],
                            chart: {
                                height: 320,
                                width: "100%",
                                type: "donut",
                            },
                            stroke: {
                                colors: ["transparent"],
                                lineCap: "",
                            },
                            plotOptions: {
                                pie: {
                                    donut: {
                                        labels: {
                                            show: true,
                                            name: {
                                                show: true,
                                                fontFamily: "Inter, sans-serif",
                                                offsetY: 20,
                                            },
                                            total: {
                                                showAlways: true,
                                                show: true,
                                                label: "Total de Actividades",
                                                fontFamily: "Inter, sans-serif",
                                                formatter: function(w) {
                                                    const sum = w.globals.seriesTotals.reduce((a, b) => {
                                                        return a + b
                                                    }, 0)
                                                    return sum
                                                },
                                            },
                                            value: {
                                                show: true,
                                                fontFamily: "Inter, sans-serif",
                                                offsetY: -20,
                                                formatter: function(value) {
                                                    return value
                                                },
                                            },
                                        },
                                        size: "80%",
                                    },
                                },
                            },
                            grid: {
                                padding: {
                                    top: -2,
                                },
                            },
                            labels: ["MOVU", "Otra Actividad", "ISSSTE Tel", "Telefonía Gratuita", "Orientación", "Pláticas",
                                "Personal en Turno", "Supervisiones", "Voceo"
                            ],
                            dataLabels: {
                                enabled: false,
                            },
                            legend: {
                                position: "bottom",
                                fontFamily: "Inter, sans-serif",
                            },
                            yaxis: {
                                labels: {
                                    formatter: function(value) {
                                        return value
                                    },
                                },
                            },
                            xaxis: {
                                labels: {
                                    formatter: function(value) {
                                        return value
                                    },
                                },
                                axisTicks: {
                                    show: false,
                                },
                                axisBorder: {
                                    show: false,
                                },
                            },
                        }
                    }

                    if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
                        const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
                        chart.render();
                    }
                </script>
                <script>
                    let reso = document.getElementById("testero").innerHTML;

                    const arrow = JSON.parse(reso);

                    const arrayAct = arrow.reduce((acc, cur) => {
                        const found = acc.find(val => val.fecha === cur.fecha)
                        if (found) {
                            found.cantidad += Number(cur.cantidad)
                        } else {
                            acc.push({
                                ...cur,
                                cantidad: Number(cur.cantidad)
                            })
                        }
                        return acc
                    }, [])

                    let resultActDia = arrayAct.map(({
                        cantidad
                    }) => cantidad);
                    let sumaAct = resultActDia.reduce((acc, e) => acc + e, 0)
                    let cantidad = resultActDia.length;
                    let prom = Math.round(sumaAct / cantidad);
                    document.getElementById("promedio").innerHTML = prom

                    let res = document.querySelectorAll("[class='tester']");
                    let list = [].slice.call(res);
                    let inner = list.map(function(e) {
                        return e.innerText;
                    });


                    console.log(reso);
                    console.log(arrow);
                    console.log(arrayAct);
                    console.log(inner);
                    console.log(resultActDia);

                    const options = {
                        // set the labels option to true to show the labels on the X and Y axis
                        xaxis: {
                            show: true,
                            categories: inner,
                            labels: {
                                show: true,
                                style: {
                                    fontFamily: "Inter, sans-serif",
                                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                                }
                            },
                            axisBorder: {
                                show: false,
                            },
                            axisTicks: {
                                show: false,
                            },
                        },
                        yaxis: {
                            show: true,
                            labels: {
                                show: true,
                                style: {
                                    fontFamily: "Inter, sans-serif",
                                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                                },
                                formatter: function(value) {
                                    return value;
                                }
                            }
                        },
                        series: [{
                            name: "Total de Actividades",
                            data: resultActDia,
                            color: "#6aa84f",
                        }, ],
                        chart: {
                            sparkline: {
                                enabled: false
                            },
                            height: "100%",
                            width: "100%",
                            type: "area",
                            fontFamily: "Inter, sans-serif",
                            dropShadow: {
                                enabled: false,
                            },
                            toolbar: {
                                show: false,
                            },
                        },
                        tooltip: {
                            enabled: true,
                            x: {
                                show: false,
                            },
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                opacityFrom: 0.55,
                                opacityTo: 0,
                                shade: "#1C64F2",
                                gradientToColors: ["#1C64F2"],
                            },
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        stroke: {
                            width: 6,
                        },
                        legend: {
                            show: false
                        },
                        grid: {
                            show: false,
                        },
                    }

                    if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined') {
                        const chart = new ApexCharts(document.getElementById("labels-chart"), options);
                        chart.render();
                    }
                </script>
                <script>
                    let censos = document.getElementById("tcensos").innerHTML;
                    const array = JSON.parse(censos);
                    let resultCes = array.map(({
                        tipo_derechohabiente
                    }) => tipo_derechohabiente);

                    const counts = {};

                    for (const num of resultCes) {
                        counts[num] = counts[num] ? counts[num] + 1 : 1;
                    }

                    // datax para grafico//////

                    let key = Object.keys(counts);



                    {{-- let keyslen = keys.length;
                    let keycopy = Array(keyslen).fill("x"); --}}

                    ///////////////////////////////

                    // datay para grafico//////
                    let value = Object.values(counts);

                    {{-- let valueslen = values.length;
                    let valecopy = Array(valueslen).fill("y"); --}}

                    let [keys, values] = [key, value];
                    const result = keys.map((k, i) => ({
                        x: k,
                        y: values[i]
                    }));

                    const optionss = {
                        colors: ["#8e7cc3"],
                        series: [{
                            name: "Censos",
                            color: "#8e7cc3",
                            data: result,
                        }, ],
                        chart: {
                            type: "bar",
                            height: "320px",
                            fontFamily: "Inter, sans-serif",
                            toolbar: {
                                show: false,
                            },
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: "80%",
                                borderRadiusApplication: "end",
                                borderRadius: 8,
                            },
                        },
                        tooltip: {
                            shared: true,
                            intersect: false,
                            style: {
                                fontFamily: "Inter, sans-serif",
                            },
                        },
                        states: {
                            hover: {
                                filter: {
                                    type: "darken",
                                    value: 1,
                                },
                            },
                        },
                        stroke: {
                            show: true,
                            width: 0,
                            colors: ["transparent"],
                        },
                        grid: {
                            show: false,
                            strokeDashArray: 4,
                            padding: {
                                left: 2,
                                right: 2,
                                top: -14
                            },
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        legend: {
                            show: false,
                        },
                        xaxis: {
                            floating: false,
                            labels: {
                                show: true,
                                style: {
                                    fontFamily: "Inter, sans-serif",
                                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                                }
                            },
                            axisBorder: {
                                show: false,
                            },
                            axisTicks: {
                                show: false,
                            },
                        },
                        yaxis: {
                            show: false,
                        },
                        fill: {
                            opacity: 1,
                        },
                    }

                    if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
                        const chart = new ApexCharts(document.getElementById("column-chart"), optionss);
                        chart.render();
                    }
                </script>
                <script>
                    let censoss = document.getElementById("tcensos").innerHTML;
                    let numCensos = +document.getElementById("ncensos").innerHTML;
                    let stringEgr = document.getElementById("stringEgr");
                    const arrays = JSON.parse(censoss);
                    let resultEgre = arrays.map(({
                        tipo_egreso
                    }) => tipo_egreso);

                    const countEgre = {};

                    for (const num of resultEgre) {
                        countEgre[num] = countEgre[num] ? countEgre[num] + 1 : 1;
                    }

                    let nulos = countEgre[null];

                    let totalCensos = !nulos ? nulos = numCensos : numCensos - nulos;
                    let stringEgresos = `${totalCensos} Egresos de ${numCensos} Censos`;
                    stringEgr.innerText = stringEgresos;

                    delete countEgre.null;

                    // datax para grafico//////

                    let key1 = Object.keys(countEgre);



                    {{-- let keyslen = keys.length;
                    let keycopy = Array(keyslen).fill("x"); --}}

                    ///////////////////////////////

                    // datay para grafico//////
                    let value1 = Object.values(countEgre);

                    {{-- let valueslen = values.length;
                    let valecopy = Array(valueslen).fill("y"); --}}


                    let [keyss, valuess] = [key1, value1];
                    const resulte = keyss.map((k, i) => ({
                        x: k,
                        y: valuess[i]
                    }));

                    const optionsss = {
                        colors: ["76a5af"],
                        series: [{
                            name: "Egresos",
                            color: "#76a5af",
                            data: resulte,
                        }, ],
                        chart: {
                            type: "bar",
                            height: "320px",
                            fontFamily: "Inter, sans-serif",
                            toolbar: {
                                show: false,
                            },
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: "80%",
                                borderRadiusApplication: "end",
                                borderRadius: 8,
                            },
                        },
                        tooltip: {
                            shared: true,
                            intersect: false,
                            style: {
                                fontFamily: "Inter, sans-serif",
                            },
                        },
                        states: {
                            hover: {
                                filter: {
                                    type: "darken",
                                    value: 1,
                                },
                            },
                        },
                        stroke: {
                            show: true,
                            width: 0,
                            colors: ["transparent"],
                        },
                        grid: {
                            show: false,
                            strokeDashArray: 4,
                            padding: {
                                left: 2,
                                right: 2,
                                top: -14
                            },
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        legend: {
                            show: false,
                        },
                        xaxis: {
                            floating: false,
                            labels: {
                                show: true,
                                style: {
                                    fontFamily: "Inter, sans-serif",
                                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                                }
                            },
                            axisBorder: {
                                show: false,
                            },
                            axisTicks: {
                                show: false,
                            },
                        },
                        yaxis: {
                            show: false,
                        },
                        fill: {
                            opacity: 1,
                        },
                    }

                    if (document.getElementById("column-chart2") && typeof ApexCharts !== 'undefined') {
                        const chart = new ApexCharts(document.getElementById("column-chart2"), optionsss);
                        chart.render();
                    }
                </script>
            </div>

        </div>
    </div>



@endsection
