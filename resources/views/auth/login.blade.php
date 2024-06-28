<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
{{--                <x-application-logo class="img-fluid w-20 h-20 fill-current text-gray-500" />--}}
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <div class="container ">
            <div class="row">

                <div class="col-md-4 offset-md-4">
                    <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
{{--                        <div>--}}
                            <label for="email" class="w-100">
                                <div>
                                    Login
                                </div>
                                <input type="email" name="email" id="email" class="form-control w-100" required />
                            </label>
                        <label for="password" class="w-100">
                            <div>
                                Password
                            </div>
                            <input type="password" name="password" id="password" class="form-control w-100">
                        </label>
{{--                            <x-label for="email" :value="__('Email')" />--}}

{{--                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--                        </div>--}}


                        <!-- Password -->
{{--                        <div class="mt-4">--}}
{{--                            <x-label for="password" :value="__('Password')" />--}}

{{--                            <x-input id="password" class="block mt-1 w-full"--}}
{{--                                     type="password"--}}
{{--                                     name="password"--}}
{{--                                     required autocomplete="current-password" />--}}
{{--                        </div>--}}

                        <!-- Remember Me -->
{{--                        <div class="block mt-4">--}}
{{--                            <label for="remember_me" class="inline-flex items-center">--}}
{{--                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">--}}
{{--                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                            </label>--}}
{{--                        </div>--}}

                        <div class="flex items-center justify-end mt-4">
{{--                            @if (Route::has('password.request'))--}}
{{--                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                                    {{ __('Forgot your password?') }}--}}
{{--                                </a>--}}
{{--                            @endif--}}

                            <x-button class="ml-3 w-100 bg-dark">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
{{--                        <button type="submit" class="form-control w-100 bg-primary">Login</button>--}}
                    </form>

                </div>
            </div>
        </div>



    </x-auth-card>
</x-guest-layout>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
