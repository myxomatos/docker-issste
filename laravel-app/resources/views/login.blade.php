@extends('layout.app')

@section('content')

    <div class="container">
        <x-auth-card>
            <x-slot name="logo">
                    <img class="rounded mx-auto d-block" style="width:40%" src="{{asset("img/issste.png")}}" alt="logo">
            </x-slot>

            <x-auth-session-status class="mb-4" :status="session('status')" />
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-label for="email" :value="__('Usuario')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-label for="password" :value="__('Contraseña')" />

                    <x-input id="password" class="block mt-1 w-full"
                             type="password"
                             name="password"
                             required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
{{--                    <label for="remember_me" class="inline-flex items-center">--}}
{{--                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">--}}
{{--                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                    </label>--}}
                </div>

                <div class="flex items-center justify-center">
{{--                    @if (Route::has('password.request'))--}}
{{--                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                            {{ __('Forgot your password?') }}--}}
{{--                        </a>--}}
{{--                    @endif--}}

                    <x-button class="button_login">
                        {{ __('Iniciar Sesión') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </div class="container">
@endsection
