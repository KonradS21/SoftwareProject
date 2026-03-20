<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Crime App') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-[url(/public/images/bgpic.jpg)] bg-cover">

    <!-- Optional navbar -->
    <nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left side -->
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                
            </div>

            <!-- Right side (NO Auth::user) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">

                <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-gray-900">
                    Login
                </a>

                <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:text-gray-900">
                    Register
                </a>

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    ☰
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                {{ __('Home') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.index')">
                {{ __('Reports') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('gethelp')" :active="request()->routeIs('gethelp')">
                {{ __('Get Help') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('login')">
                {{ __('Login') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('register')">
                {{ __('Register') }}
            </x-responsive-nav-link>

        </div>
    </div>
</nav>

    <!-- Page Content -->
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="mt-16 mb-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-900 text-white rounded-lg shadow-sm p-6 text-center">

                <h3 class="text-lg font-semibold mb-2">Crime App</h3>

                <p class="text-gray-300 text-sm mb-3">
                    Helping communities stay informed about local crime reports
                    and improve neighbourhood awareness.
                </p>

                <p class="text-gray-400 text-xs">
                    © {{ date('Y') }} Crime App. All rights reserved.
                </p>

            </div>
        </div>
    </footer>

</body>
</html>