@extends('layout.home')

@section('content')

    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>
        <div class="uk-width-expand@m padd_style">
            <div class="uk-text-center">
                <h2>
                    Inserta un Hospital nuevo
                </h2>

            </div>
            <div class="uk-card uk-card-default uk-card-body "style="background: #bc955c">

                <form  method="POST" action="{{ route('storeHospital') }}" class="uk-form-stacked">
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
                                <label class="uk-form-label" for="form-stacked-select">Subcoordinador *</label>
                                <div class="uk-form-controls">
                                    <select required name="subcordinador_id" class="uk-select" id="form-stacked-select">
                                    @foreach($usuarios as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} {{ $user->apellidos }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="uk-margin uk-text-center uk-margin-medium-top">
                            <button type="submit" class="button_back"style="width: 150px;height: 30px">
                                Guardar
                            </button>
                        </div>

                    </div>



                </form>
            </div>

        </div>
    </div>



@endsection


