@extends('layout.home')

@section('content')
<style>
        main.table {
            width: 100%;
            height: 90vh;
            background-color: #fff5;
            overflow: hidden;
            margin: .4rem;
        }

        .table__header {
            width: 100%;
            height: 10%;
            background-color: #fff4;
            padding: .8rem 1rem;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table__header .input-group {
            width: 35%;
            height: 100%;
            background-color: #F0F0F0;
            padding: 0 .8rem;
            border-radius: 2rem;

            display: flex;
            justify-content: center;
            align-items: center;

            transition: .2s;
        }

        .table__header .input-group:hover {
            width: 45%;
            background-color: #fff8;
            box-shadow: 0 .1rem .4rem #0002;
        }

        .table__header .input-group img {
            width: 1.2rem;
            height: 1.2rem;
        }

        .table__header .input-group input {
            width: 100%;
            background-color: transparent;
            border: none;
            outline: none;
        }

        .table__body {
            width: 100%;
            max-height: calc(89% - 1.6rem);
            background-color: #fffb;

            margin: .8rem auto;

            overflow: auto;
            overflow: overlay;
        }


        .table__body::-webkit-scrollbar{
            width: 0.5rem;
            height: 0.5rem;
        }

        .table__body::-webkit-scrollbar-thumb{
            border-radius: .5rem;
            background-color: #0004;
            visibility: hidden;
        }

        .table__body:hover::-webkit-scrollbar-thumb{ 
            visibility: visible;
        }

        table {
            border-collapse: collapse;
            padding: .5rem;
            text-align: left;
            width: 100%;
        }

        th {
            border-collapse: collapse;
            padding: .4rem;
            text-align: left;
            font-size: .85vw;
        }

        td {
            border-collapse: collapse;
            padding: .2rem;
            text-align: left;
            font-size: .8vw;
        }


        
        thead th {
            top: 0;
            left: 0;
            background-color: #36304a;
            cursor: pointer;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #0000000b;
        }

        tbody tr {
            --delay: .1s;
            transition: .1s ease-in-out var(--delay), background-color 0s;
        }

        tbody tr.hide {
            opacity: 0;
            transform: translateX(100%);
        }

        tbody tr:hover {
            background-color: #fff6 !important;
        }

        tbody tr td,
        tbody tr td p,
        tbody tr td img {
            transition: .1s ease-in-out;
        }

        tbody tr.hide td,
        tbody tr.hide td p {
            padding: 0;
            font: 0 / 0 sans-serif;
            transition: .1s ease-in-out .1s;
        }

        tbody tr.hide td img {
            width: 0;
            height: 0;
            transition: .1s ease-in-out .1s;
        }
        @media (max-width: 1000px) {
            td:not(:first-of-type) {
                min-width: 12.1rem;
            }
        }

        thead th span.icon-arrow {
            display: inline-block;
            border: 1.4px solid transparent;
            
            text-align: center;
            font-size: 1.3rem;
            
            margin-left: .5rem;
            transition: .1s ease-in-out;
        }


        thead th:hover {
            color: #9f52c5;
        }

        thead th.active span.icon-arrow{
            color: #9f52c5;
        }

        thead th.asc span.icon-arrow{
            transform: rotate(180deg);
        }

        thead th.active,tbody td.active {
            color: #9f52c5;
        }
    </style>

    <div class="uk-grid">
        

        <main class="table">
                    <a href="{{ route('homeIndexPanel') }}">
                        <button class="button_back" style="float: right; margin: 10px;">
                            Volver
                        </button>
                    </a>
                
                <section class="table__header">
                    <h1 class="color_7">
                            Búsqueda de pacientes en Hospitales
                    </h1>
                    
                    <div class="input-group">
                        <input type="search" placeholder="Buscar paciente...">
                        <img src="../../public/img/search.png" alt="">
                    </div>
                </section>
            @if(count($pacientes) !== 0)
            <div class="uk-text-center">
            {{ $pacientes->links() }}
    {{--                   {!! $pacientes->links("partials.paginate") !!}--}}
            </div>
            @else
            <div></div>
            @endif
            <section class="table__body">
                
                <table>
                    <thead>
                    <tr>
                        <th>Ingreso <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Nombre <span class="icon-arrow">&UpArrow;</span></th>
                        <th>RFC <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Genero <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Tipo Derechohabiente <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Tipo Hospitalizacion <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Hospital <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Dato de Salud <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Estado <span class="icon-arrow">&UpArrow;</span></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pacientes as $i)
                        <tr>
                            <td class="textTransform">
                                {{ date('d-m-Y H:i:s', strtotime($i->created_at)) }}
                            </td>
                            <td class="textTransform">
                                {{ $i->apellidos }} {{ $i->nombre }}
                            </td>
                            <td>
                                {{ $i->rfc }}
                            </td>
                            <td class="textTransform">
                                {{ $i->genero }}
                            </td>
                            <td>
                                {{ $i->tipo_derechohabiente }}
                            </td>
                            <td>
                                {{ $i->tipo_hospitalizacion }}
                            </td>
                            @if ($i->hospital_id == 1)
                                <td class="textTransform">H.R. 1° DE OCTUBRE</td>
                            @elseif ($i->hospital_id == 2)
                                <td class="textTransform">H.G. DR. FERNANDO QUIROZ GUTIÉRREZ</td>
                            @elseif ($i->hospital_id == 3)
                                <td class="textTransform">H.G. DR. DARÍO FERNÁNDEZ FIERRO</td>
                            @elseif ($i->hospital_id == 4)
                                <td class="textTransform">H.R. GRAL. IGNACIO ZARAGOZA</td>
                            @elseif ($i->hospital_id == 5)
                                <td class="textTransform">H.G. GRAL. JOSÉ MARÍA MORELOS Y PAVÓN</td>
                            @elseif ($i->hospital_id == 6)
                                <td class="textTransform">CENTRO MÉDICO NACIONAL 20 DE NOVIEMBRE</td>
                            @elseif ($i->hospital_id == 7)
                                <td class="textTransform">H.R. LIC. ADOLFO LÓPEZ MATEOS</td>
                            @elseif ($i->hospital_id == 8)
                                <td class="textTransform">H.G. TACUBA</td>
                            @elseif ($i->hospital_id == 9)
                                <td class="textTransform">H.A.E. BICENTENARIO DE LA INDEPENDENCIA</td>
                            @elseif ($i->hospital_id == 10)
                                <td class="textTransform">H.R. LEON</td>
                            @elseif ($i->hospital_id == 11)
                                <td class="textTransform">H.R. VALENTIN GOMEZ FARIAS</td>
                            @elseif ($i->hospital_id == 12)
                                <td class="textTransform">H.R. MORELIA</td>
                            @elseif ($i->hospital_id == 13)
                                <td class="textTransform">H.A.E. CENTENARIO DE LA REVOLUCION MEXICANA</td>
                            @elseif ($i->hospital_id == 14)
                                <td class="textTransform">H.R. MONTERREY</td>
                            @elseif ($i->hospital_id == 15)
                                <td class="textTransform">H.R. PRESIDENTE BENITO JUAREZ</td>
                            @elseif ($i->hospital_id == 16)
                                <td class="textTransform">H.R. PUEBLA</td>
                            @elseif ($i->hospital_id == 17)
                                <td class="textTransform">H.R. DR. MANUEL CARDENAS DE LA VEGA</td>
                            @elseif ($i->hospital_id == 18)
                                <td class="textTransform">H.A.E. VERACRUZ</td>
                            @elseif ($i->hospital_id == 19)
                                <td class="textTransform">H.R. MERIDA</td>
                            @endif
                            <td class="textTransform">
                                {{ $i->dato_salud }}
                            </td>
                            <td class="textTransform">
                                {{ $i->status }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </section>

        </main>
    </div>
    <script>
        const table_rows = document.querySelectorAll('tbody tr'),
        table_headings = document.querySelectorAll('thead th'),
        search = document.querySelector('.input-group input');

        // 1. Searching for specific data of HTML table
        search.addEventListener('input', searchTable);

        function searchTable() {
            table_rows.forEach((row, i) => {
                let table_data = row.textContent.toLowerCase(),
                    search_data = search.value.toLowerCase();

                row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
                row.style.setProperty('--delay', i / 25 + 's');
            })

            document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
                visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
            });
        }

        // 2. Sorting | Ordering data of HTML table
        table_headings.forEach((head, i) => {
            let sort_asc = true;
            head.onclick = () => {
                table_headings.forEach(head => head.classList.remove('active'));
                head.classList.add('active');

                document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
                table_rows.forEach(row => {
                    row.querySelectorAll('td')[i].classList.add('active');
                })

                head.classList.toggle('asc', sort_asc);
                sort_asc = head.classList.contains('asc') ? false : true;

                sortTable(i, sort_asc);
            }
        })


        function sortTable(column, sort_asc) {
            [...table_rows].sort((a, b) => {
                let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
                    second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

                return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
            })
                .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
        }
    </script>


@endsection