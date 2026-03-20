<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Crime App') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans  text-gray-900 antialiased bg-[url(/public/images/bgpic.jpg)] bg-cover">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
            

            <div class="  mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    <footer class="mt-16 mb-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-900 text-white rounded-lg shadow-sm p-6 text-center">

                <h3 class="text-lg font-semibold mb-2">Crime App</h3>

                <p class="text-gray-300 text-sm mb-3">
                    Helping communities stay informed about local crime reports and
                    improve neighbourhood awareness through shared information.
                </p>

                <p class="text-gray-400 text-xs">
                    © {{ date('Y') }} Crime App. All rights reserved.
                </p>

            </div>
        </div>
    </footer>
    </body>
</html>
