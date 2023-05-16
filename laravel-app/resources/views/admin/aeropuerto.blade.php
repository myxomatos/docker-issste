@extends('layout.home')

@section('content')

    <div >

        <div class=""style="padding: 0px 20px 0px 20px">
            <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th>Cama</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Genero</th>
                    <th>Fecha de nacimiento</th>
                    <th>RFC</th>
                    <th>Tipo Derechohabiente</th>
                    <th>Diagnostico</th>
                    <th>Hospital</th>
                    <th>Estado</th>

                </tr>
                </thead>
                <tbody>
                @foreach($censos as $i)
                    <tr>
                        <td>
                            {{ $i->cama }}
                        </td>
                        <td class="textTransform">
                            {{ $i->nombre }}
                        </td>

                        <td class="textTransform">
                            {{ $i->apellidos }}
                        </td>
                        <td class="textTransform">
                            {{ $i->genero }}
                        </td>
                        <td>
                            {{ $i->edad }}
                        </td>
                        <td>
                            {{ $i->rfc }}
                        </td>
                        <td>
                            {{ $i->tipo_derechohabiente }}
                        </td>
                        <td class="textTransform">
                            {{ $i->diagnostico }}
                        </td>
                        <td class="textTransform">
                            {{ $i->hospitales->nombre }}
                        </td>
                        
                        <td class="textTransform">
                            {{ $i->status }}
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
              <div class="uk-alert-primary" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
        </div>
    </div>
<script>
var btn = document.querySelector("[name='clicking']");
//console.log(btn);
setInterval(function(){
btn.click();
},40000);

//Handling of click event
btn.onclick=function(){
console.log('clicked');
}

</script>
@endsection


