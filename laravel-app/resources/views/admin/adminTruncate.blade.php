@extends('layout.home')

@section('content')
    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>
        <div class="uk-width-expand@m uk-margin-top uk-margin-right uk-margin-bottom">
            <div class="uk-text-center" style="margin: 40px 0px 250px 0px">
                <button class="button_back" style="width: 210px;height: 40px" type="button" uk-toggle="target: #modal-example">Eliminar Registros</button>
            </div>


            <!-- This is the modal -->
            <div id="modal-example" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">

                    <p>¿Deseas eliminar los registros del mes pasado?</p>
                    <p>Esta acción no es reversible</p>
                    <p class="uk-text-right">
                        <button class="uk-button uk-button-danger uk-modal-close" type="button">Cancelar</button>
                        <a href="{{ route('TruncateAdmin') }}">
                            <button class="uk-button uk-button-primary" type="button" style="background-color: darkgreen">Aceptar</button>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>



@endsection
