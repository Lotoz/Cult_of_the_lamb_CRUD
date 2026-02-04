<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-500 leading-tight uppercase tracking-widest">
            {{ __('Enrollment Ritual') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4">
                <a href="{{ route('followers.index') }}" class="text-gray-500 hover:text-purple-400 transition text-sm flex items-center uppercase tracking-tighter">
                    ← Back to the Temple
                </a>
            </div>

            @if ($errors->any())
            <div class="mb-6 p-4 bg-purple-900/30 border border-purple-500 text-purple-200 rounded-lg shadow-[0_0_15px_rgba(168,85,247,0.2)]">
                <p class="font-bold mb-2 uppercase text-xs tracking-widest">Ritual Errors:</p>
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="bg-gray-900 overflow-hidden shadow-2xl sm:rounded-lg p-8 border border-purple-900/50 relative">
                <div class="absolute -top-24 -right-24 w-48 h-48 bg-purple-600/10 rounded-full blur-3xl"></div>

                <form method="POST" action="{{ route('followers.store') }}" class="space-y-6 relative">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Follower Name')" class="text-purple-300 uppercase text-xs" />
                        <x-text-input id="name" name="name" type="text"
                            class="mt-1 block w-full bg-black border-purple-900 text-white focus:border-purple-500 focus:ring-purple-500 placeholder-gray-700"
                            :value="old('name')" required />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="species" :value="__('Species')" class="text-purple-300 uppercase text-xs" />
                            <select id="species" name="species"
                                class="mt-1 block w-full bg-black border-purple-900 text-white rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                <option value="Cat">Cat</option>
                                <option value="Deer">Deer</option>
                                <option value="Pig">Pig</option>
                                <option value="Dog">Dog</option>
                                <option value="Wolf">Wolf</option>
                                <option value="Spider">Spider</option>
                                <option value="Rabbit">Rabbit</option>
                                <option value="Squid">Squid</option>
                                <option value="Frog">Frog</option>
                                <option value="Crocodile">Crocodile</option>
                            </select>
                        </div>

                        <div>
                            <x-input-label for="joined_at" :value="__('Date of Allegiance')" class="text-purple-300 uppercase text-xs" />
                            <x-text-input id="joined_at" name="joined_at" type="date"
                                class="mt-1 block w-full bg-black border-purple-900 text-white focus:border-purple-500 focus:ring-purple-500"
                                required />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="level" :value="__('Power Level (Max 100)')" class="text-purple-300 uppercase text-xs" />
                            <x-text-input id="level" name="level" type="number"
                                class="mt-1 block w-full bg-black border-purple-900 text-white focus:border-purple-500 focus:ring-purple-500"
                                :value="old('level')" required />
                        </div>

                        <div>
                            <x-input-label for="loyalty_points" :value="__('Loyalty Points (0-100)')" class="text-purple-300 uppercase text-xs" />
                            <x-text-input id="loyalty_points" name="loyalty_points" type="number"
                                class="mt-1 block w-full bg-black border-purple-900 text-white focus:border-purple-500 focus:ring-purple-500"
                                :value="old('loyalty_points')" required />
                        </div>
                    </div>

                    <div class="flex items-center p-4 bg-black/40 rounded-lg border border-purple-900/30">
                        <input id="is_elderly" name="is_elderly" type="checkbox" value="1"
                            class="rounded bg-black border-purple-900 text-purple-600 shadow-sm focus:ring-purple-500">
                        <label for="is_elderly" class="ml-2 text-sm text-purple-400">{{ __('Has this follower reached old age?') }}</label>
                    </div>

                    <div class="flex items-center justify-end mt-4 pt-6 border-t border-purple-900/20">
                        <x-primary-button class="ml-4 bg-purple-700 hover:bg-purple-600 text-white border border-purple-500 shadow-[0_0_10px_rgba(168,85,247,0.4)]">
                            {{ __('Seal Allegiance') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>