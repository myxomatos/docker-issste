@extends('layout.home')

@section('content')
    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebar')
        </div>
        <div class="uk-width-expand@m uk-margin-top uk-margin-right uk-margin-bottom">
            <div class="uk-card uk-card-default uk-card-body card_counter uk-text-center">
                <p class="color_7" style="font-size: 24px; margin: 0px;">¡Mantenimiento realizacon con éxito!</p>
            </div>
        </div>
    </div>



@endsection

