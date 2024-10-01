<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen  dark:bg-gray-900">
            @include('layouts.navigation')
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-transparent relative z-10">
                    <div class="bg-transparent max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            <!-- Page Content -->
            <main>
               <div class="">
                    {{ $slot }}
               </div>
               <div id="particles-js" class=""></div>
            </main>
        </div>

        <script src="{{ asset('/js/particles.min.js') }}"></script> <!-- particles.min.js を先に読み込む -->
        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
