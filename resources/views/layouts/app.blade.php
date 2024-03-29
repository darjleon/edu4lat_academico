<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/25bc89a4e6.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    @yield('js')
</head>

<body class="font-sans antialiased">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div x-data="{ open: false }" @keydown.window.escape="open = false"
        class="flex h-screen overflow-hidden bg-gray-100">
        <x-sidebar />
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <div class="pt-1 pl-1 md:hidden sm:pl-3 sm:pt-3">
                <button
                    class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    @click="open = true">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" x-description="Heroicon name: outline/menu" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <main class="relative z-0 flex-1 overflow-y-auto focus:outline-none" tabindex="0">
                <div class="">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>

</html>
