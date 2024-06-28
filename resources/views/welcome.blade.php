<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <div class="text-right m-3"  style="width: 10% !important;">
        <select class="form-select p-3 "  name="language">
            <option value="en" {{ \Session::get('language') == 'en' ? 'selected' : '' }}>English</option>
            <option value="ru" {{ \Session::get('language') == 'ru' ? 'selected' : '' }}>Русский</option>
            <option value="am" {{ \Session::get('language') == 'am' ? 'selected' : '' }}>Հայերեն</option>
        </select>
    </div>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    <div>
        <h1>
            {{ __('hello') }}
        </h1>
    </div>
{{--  --}}
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('select[name=language]').change(function() {
                            var lang = $(this).val();
                            window.location.href = "{{ route('changeLanguage') }}?language="+lang;
                        });
                    });
                </script>
    </body>
</html>
