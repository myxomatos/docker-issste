<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>@yield('title', 'Issste')</title>
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
    <!-- uikit -->
    <link rel="stylesheet" href="{{ asset('/css/uikit.css') }}" media="all">
    <!-- Styles -->
    <link rel="newest stylesheet" href="{{ asset('css/custom.css') }}" media="all">
    <!-- Admin -->
    <link rel="newest stylesheet" href="{{ asset('css/admin.css') }}" media="all">


</head>
<body>

    <header>
        @include('partials.header')
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
