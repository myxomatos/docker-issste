@extends('layout.home')

@section('content')

    <div >

        <div class=""style="padding: 0px 20px 0px 20px">
            <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th>Folio</th>
                    <th>Dato de Salud</th>
                    <th>Hora de actualización</th>

                </tr>
                </thead>
                <tbody>
                @foreach($censos as $i)
                    <tr>
                        <td>
                            {{ $i->folio }}
                        </td>
                        <td>
                            {{ $i->dato_salud }}
                        </td>
                        <td>
<!--                            --><?php
//                                $historico = \App\Models\HistoricoCenso::where('censo_id',$i->id)
//                            ->orderBy('updated_at', 'desc')->first();
//                            ?>
                            {{ $i->updated_at }}
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <div class="uk-text-center">
                {{-- {!! $censos->links("partials.paginate") !!} --}}
            </div>
            <ul class="pagination uk-hidden">
                {{-- <li class="page-item"><a class="page-link" href="{{ $censos->previousPageUrl() }}">Previous</a></li> --}}
                @if($censos->hasMorePages())
                <li class="page-item"><a name="clicking" class="page-link" href="{{ $censos->nextPageUrl() }}">Next</a></li>
                @else
                <li class="page-item"><a name="clicking" class="page-link" href="{{ route('aeropuerto') }}">Next</a></li>
                @endif
              </ul>
              <div class="uk-alert" uk-alert>
                <img style="width: 500px;" src="../../../public/img/Screenshot 2023-05-17 at 22.11.00.png" alt="">
                <p class="text-xs">El Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado (ISSSTE), a través de la
Dirección Estratégica de Información, Supervisión y Evaluación (DEISE), hace de su conocimiento que
los datos personales proporcionados en el Sistema de Registro de Actividades de Enlaces en Salas de
Urgencias (SIRAESU), están protegidos y resguardados, conforme a lo dispuesto por la Ley General de
Protección de Datos Personales en Posesión de Sujetos Obligados y demás normatividad aplicable.
Sus datos personales serán utilizados en el ejercicio de las facultades previstos en los artículos 3
fracción I, 5 y 11 de la Ley del Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado;
1, 4 fracción I inciso d), 57 fracciones V, IX, X, XI y XVIII del Estatuto Orgánico del Instituto de Seguridad
y Servicios Sociales de los Trabajadores del Estado. No se requerirá del consentimiento del particular
para la transferencia y tratamiento de datos personales en términos del artículo 1, 3 fracciones II, III, IX,
X, XXXII y XXXIII, 4, 16, 17, 18, 21, 22, 23, 25, 26 y 28 de la Ley General de Protección de Datos Personales
en Posesión de Sujetos Obligados.</p>
                <p class="text-xs">Podrá oponerse al uso de sus datos personales para fines específicos conforme a los requisitos
establecidos en el Aviso de Privacidad Integral.</p>
                <p class="text-xs">Sí desea conocer nuestro Aviso de Privacidad Integral ingrese aquí:</br><a style="color: blue;"href="#">http://www.issste.gob.mx/transparencia/transparenciaaprivacidad.html.</a></p>
                <p class="text-xs">Fecha de elaboración o actualización: 02/05/2023</p>
              </div>
        </div>
    </div>
<script>
var btn = document.querySelector("[name='clicking']");
//console.log(btn);
setInterval(function(){
btn.click();
},20000);

//Handling of click event
btn.onclick=function(){
console.log('clicked');
}

</script>
@endsection


