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

<body class="font-sans text-gray-100 antialiased bg-black selection:bg-purple-600 selection:text-white">

    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute top-[-20%] left-[-10%] w-[60%] h-[60%] rounded-full bg-red-900/20 blur-[100px] animate-pulse"></div>
        <div class="absolute bottom-[-20%] right-[-10%] w-[60%] h-[60%] rounded-full bg-purple-900/20 blur-[100px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10">
        <div class="mb-6">
            <a href="/">
                <x-application-logo class="w-24 h-24 fill-current text-red-600 drop-shadow-[0_0_15px_rgba(220,38,38,0.6)] transition hover:scale-105 duration-300" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-gray-900 border border-purple-900/50 shadow-[0_0_50px_rgba(88,28,135,0.15)] overflow-hidden sm:rounded-lg backdrop-blur-sm">
            {{ $slot }}
        </div>

        <div class="mt-8 text-xs text-gray-600 uppercase tracking-widest">
            Join the Flock • {{ date('Y') }}
        </div>
    </div>
</body>

</html>