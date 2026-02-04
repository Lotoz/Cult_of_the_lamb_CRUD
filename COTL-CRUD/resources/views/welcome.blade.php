<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cult of the Lamb CRUD</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white antialiased selection:bg-red-600 selection:text-white">

    <nav class="p-6 flex justify-end gap-4">
        @auth
        <a href="{{ url('/dashboard') }}" class="px-5 py-2 border border-red-900 rounded-sm text-sm hover:bg-red-900/20 transition uppercase tracking-tighter">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="px-5 py-2 text-sm hover:text-red-500 transition uppercase tracking-tighter">Log in</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="px-5 py-2 border border-red-900 rounded-sm text-sm hover:bg-red-900/20 transition uppercase tracking-tighter">Register</a>
        @endif
        @endauth
    </nav>

    <main class="flex flex-col items-center justify-center min-h-[75vh] text-center px-4">

        <div class="space-y-4 mb-10">
            <h1 class="text-gray-500 uppercase tracking-[0.3em] text-xs font-bold">Welcome to the project:</h1>
            <h2 class="text-5xl md:text-8xl font-black text-red-600 uppercase tracking-tighter drop-shadow-[0_0_20px_rgba(220,38,38,0.4)]">
                Cult of the Lamb <span class="text-white">CRUD</span>
            </h2>
            <p class="text-gray-400 text-lg mt-4 font-light">
                Development of
                <a href="https://github.com/Lotoz" target="_blank" class="text-red-500 hover:text-white border-b border-red-900 hover:border-white transition-all duration-500 italic px-1">
                    Lotoz
                </a>
            </p>
        </div>

        <div class="relative group mt-4">
            <div class="absolute -inset-4 bg-red-700 rounded-full blur-3xl opacity-10 group-hover:opacity-30 transition duration-1000"></div>

            <img src="{{ asset('img/crown.gif') }}"
                alt="Cult Ritual GIF"
                class="relative w-48 md:w-64 drop-shadow-[0_10px_10px_rgba(0,0,0,0.5)]">
        </div>

    </main>

    <footer class="fixed bottom-0 w-full p-8 text-center text-red-900/30 text-[10px] uppercase tracking-[0.5em]">
        Praise the Lamb • 2026
    </footer>
</body>

</html>