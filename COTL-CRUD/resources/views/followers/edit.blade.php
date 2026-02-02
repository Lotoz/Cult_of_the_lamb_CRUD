<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-600 leading-tight uppercase tracking-tighter">
            {{ __('Realizar Ritual de Modificación: ') }} <span class="text-white">{{ $follower->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('followers.index') }}" class="text-gray-400 hover:text-white transition text-sm flex items-center">
                    ← Volver al Culto
                </a>
            </div>

            <div class="bg-gray-900 overflow-hidden shadow-2xl sm:rounded-lg p-8 border-2 border-red-800">

                <form method="POST" action="{{ route('followers.update', $follower) }}" class="space-y-6">
                    @csrf
                    @method('PATCH') <div>
                        <x-input-label for="name" :value="__('Nombre del Adepto')" class="text-gray-400" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-gray-800 text-white border-red-900 focus:border-red-500 focus:ring-red-500"
                            value="{{ old('name', $follower->name) }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="species" :value="__('Especie')" class="text-gray-400" />
                            <select id="species" name="species" class="mt-1 block w-full bg-gray-800 text-white border-red-900 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500">
                                @foreach(['Cat', 'Deer', 'Pig', 'Dog', 'Wolf', 'Spider', 'Rabbit', 'Squid', 'Frog', 'Crocodile'] as $species)
                                <option value="{{ $species }}" {{ old('species', $follower->species) == $species ? 'selected' : '' }}>
                                    {{ $species }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="joined_at" :value="__('Fecha de Adhesión')" class="text-gray-400" />
                            <x-text-input id="joined_at" name="joined_at" type="date" class="mt-1 block w-full bg-gray-800 text-white border-red-900 focus:border-red-500 focus:ring-red-500"
                                value="{{ old('joined_at', $follower->joined_at->format('Y-m-d')) }}" required />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="level" :value="__('Nivel de Poder')" class="text-gray-400" />
                            <x-text-input id="level" name="level" type="number" min="1" class="mt-1 block w-full bg-gray-800 text-white border-red-900 focus:border-red-500 focus:ring-red-500"
                                value="{{ old('level', $follower->level) }}" required />
                        </div>

                        <div>
                            <x-input-label for="loyalty_points" :value="__('Puntos de Lealtad')" class="text-gray-400" />
                            <x-text-input id="loyalty_points" name="loyalty_points" type="number" min="0" class="mt-1 block w-full bg-gray-800 text-white border-red-900 focus:border-red-500 focus:ring-red-500"
                                value="{{ old('loyalty_points', $follower->loyalty_points) }}" required />
                        </div>
                    </div>

                    <div class="flex items-center p-4 bg-gray-800/50 rounded-lg border border-red-900/30">
                        <input id="is_elderly" name="is_elderly" type="checkbox" value="1"
                            {{ old('is_elderly', $follower->is_elderly) ? 'checked' : '' }}
                            class="rounded bg-gray-900 border-red-900 text-red-600 shadow-sm focus:ring-red-500">
                        <label for="is_elderly" class="ml-2 text-sm text-gray-400">
                            {{ __('El adepto ha envejecido (Marcar como Anciano)') }}
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4 pt-4 border-t border-red-900/50">
                        <x-primary-button class="ml-4 bg-red-800 hover:bg-red-600 text-white border border-red-500">
                            {{ __('Actualizar Adepto') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>