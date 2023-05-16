@extends('layout.app')

@section('content')

    <div class="uk-card uk-card-default uk-card-large padd_marg_card uk-text-center">
        <h3 class="uk-card-title">Regístrate</h3>
        <form action="{{route('validar-registro')}}" method="post">
            @csrf

            <div class="uk-margin">
                <div class="uk-inline uk-text-center">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input class="uk-input uk-form-width-medium" type="text" name="name" placeholder="Ingresa tu nombre">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-inline uk-text-center">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input class="uk-input uk-form-width-medium" type="text" name="apellido" placeholder="Ingresa tu apellido">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-inline uk-text-center">
                    <span class="uk-form-icon" uk-icon="icon: mail"></span>
                    <input class="uk-input uk-form-width-medium" type="text" name="email" placeholder="Ingresa tu email">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-inline uk-text-center">
                    <span class="uk-form-icon" uk-icon="icon: users"></span>
                    <select required name="rol" class="uk-select uk-form-width-medium" id="form-stacked-select">
                        <option value="coordinador">Coordinador</option>
                        <option value="subcoordinador">Subcoordinador</option>
                        <option value="enlace">Enlace</option>
                    </select>
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-inline uk-text-center">
                    <span class="uk-form-icon" uk-icon="icon: location"></span>
                    <select required name="hospital_id" class="uk-select uk-form-width-medium" id="form-stacked-select">
                        <option value="1">H.R. 1° DE OCTUBRE</option>
                        <option value="2">H.G. DR. FERNANDO QUIROZ GUTIÉRREZ</option>
                        <option value="3">H.G. DR. DARÍO FERNÁNDEZ FIERRO</option>
                        <option value="4">H.R. GRAL. IGNACIO ZARAGOZA</option>
                        <option value="5">H.G. GRAL. JOSÉ MARÍA MORELOS Y PAVÓN</option>
                        <option value="6">CENTRO MÉDICO NACIONAL 20 DE NOVIEMBRE</option>
                        <option value="7">H.R. LIC. ADOLFO LÓPEZ MATEOS</option>
                        <option value="8">H.G. TACUBA</option>
                        <option value="9">H.A.E. BICENTENARIO DE LA INDEPENDENCIA</option>
                        <option value="10">H.R. LEON</option>
                        <option value="11">H.R. VALENTIN GOMEZ FARIAS</option>
                        <option value="12">H.R. MORELIA</option>
                        <option value="13">H.A.E. CENTENARIO DE LA REVOLUCION MEXICANA</option>
                        <option value="14">H.R. MONTERREY</option>
                        <option value="15">H.R. PRESIDENTE BENITO JUAREZ</option>
                        <option value="16">H.R. PUEBLA</option>
                        <option value="17">H.R. DR. MANUEL CARDENAS DE LA VEGA</option>
                        <option value="18">H.A.E. VERACRUZ</option>
                        <option value="19">H.R. MERIDA</option>
                    </select>
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-inline uk-text-center">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                    <input class="uk-input uk-form-width-medium" type="password" name="password" placeholder="Ingresa tu contraseña">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-inline uk-text-center">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                    <input class="uk-input uk-form-width-medium" type="password" name="password_confirmation" placeholder="Confirma tu contraseña">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-inline uk-text-center">
                    <button class="uk-button uk-button-default button_login">Registro</button>
                </div>
            </div>
        </form>
    </div>

@endsection
