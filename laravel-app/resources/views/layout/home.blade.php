<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title', 'SIRAESU')</title>
    <meta name="description" content="@yield('description', '')" />
    <meta name="keywords" content="@yield('keywords', '')">



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
    <!-- uikit functions -->
    <script src="{{ asset('/js/uikit.js') }}"></script>
    <script src="{{ asset('/js/uikit-icons.min.js') }}"></script>
    <script src="{{ asset('/tailchart/js/apexcharts.js') }}"></script>
    <script src="{{ asset('/tailchart/js/flowbite.min.js') }}"></script>
    <!-- uikit -->
    <link rel="stylesheet" href="{{ asset('/css/uikit.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('/tailchart/css/flowbite.min.css') }}" media="all">
    <!-- Styles -->
    <link rel="newest stylesheet" href="{{ asset('css/custom.css') }}" media="all">
    <!-- Styles -->
    <link rel="newest stylesheet" href="{{ asset('css/custom.css') }}" media="all">
    <!-- Styles -->
    <link rel="newest stylesheet" href="{{ asset('css/admin.css') }}" media="all">

</head>

<body>
    @if (Auth::User()->check_in === 0)
        <div id="modal-overflow" uk-modal bg-close="false">
            <div class="uk-modal-dialog">
                <a href="{{ route('homeIndexPanel') }}">
                    <button style="float: right;margin: 15px 15px 0px 0px" type="button" uk-close></button>
                </a>


                <div class="uk-modal-header">
                    <h2 class="uk-modal-title">¡Hola, {{ Auth::User()->name }}!</h2>
                </div>

                <div class="uk-modal-body" uk-overflow-auto>

                    <p>No olvides registrar tu hora de entrada</p>


                </div>

                <div class="uk-modal-footer uk-text-right">
                    <a href="{{ route('homeIndexPanel') }}">
                        <button class="button_back_2" type="button">Despues</button>
                    </a>
                    <a href="{{ route('createCheckIn') }}">
                        <button class="button_back" type="button">Ahora</button>
                    </a>
                </div>

            </div>
        </div>
        <script>
            UIkit.modal('#modal-overflow').show();
        </script>
    @endif
    <header>
        @include('partials.header_home')
    </header>
    <div id="content">
        @yield('content')
    </div>
    <div id="full-width">
        @yield('fullwidth')
    </div>
    <footer>
        @include('partials.footer')
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>

</html>
