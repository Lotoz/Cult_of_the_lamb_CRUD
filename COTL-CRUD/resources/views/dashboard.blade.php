<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-red-600 leading-tight uppercase tracking-widest">
            {{ __('Cult Sanctuary') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-2xl sm:rounded-lg border-2 border-red-900 p-8 text-center">

                @php
                $isLamb = Auth::user()->leader_type === 'Lamb';
                $avatar = $isLamb ? 'img/lamb_avatar.gif' : 'img/goat_avatar.webp';
                $greeting = $isLamb ? 'Hello, Mighty Lamb!' : 'Welcome, Chaos Goat!';
                @endphp

                <div class="flex flex-col items-center space-y-6">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-red-600 rounded-full blur opacity-40 animate-pulse"></div>
                        <img src="{{ asset($avatar) }}" alt="Leader Avatar" class="relative w-40 h-40 rounded-full border-4 border-red-800 object-cover bg-black">
                    </div>

                    <div>
                        <h1 class="text-4xl font-black text-white uppercase tracking-tighter">
                            {{ $greeting }}
                        </h1>
                        <p class="text-red-500 mt-2 italic text-lg">
                            "Your cult currently has {{ Auth::user()->followers->count() }} followers under your command."
                        </p>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('followers.index') }}" class="inline-flex items-center px-6 py-3 bg-red-800 border border-red-500 rounded-full font-bold text-white uppercase tracking-widest hover:bg-red-600 transition-all duration-300 shadow-[0_0_15px_rgba(220,38,38,0.3)]">
                            Manage My Cult
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>