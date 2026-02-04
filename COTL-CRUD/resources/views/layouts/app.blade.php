<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cult of the Lamb CRUD') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-black text-gray-100">

    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full bg-red-900/20 blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-purple-900/20 blur-[120px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <div class="min-h-screen relative z-10 flex flex-col">
        @include('layouts.navigation')

        @isset($header)
        <header class="bg-gray-900/80 backdrop-blur-md border-b border-purple-900/50 shadow-[0_4px_20px_rgba(88,28,135,0.2)]">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <main class="flex-1">
            {{ $slot }}
        </main>

        <footer class="py-6 text-center text-xs text-purple-500/40 uppercase tracking-[0.3em]">
            Chaos awaits • {{ date('Y') }}
        </footer>
    </div>
</body>

</html>