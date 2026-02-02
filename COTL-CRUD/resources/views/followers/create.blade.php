<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-600 leading-tight">
            {{ __('Reclutar Nuevo Seguidor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-red-800">

                <form method="POST" action="{{ route('followers.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Nombre del Adepto')" class="text-gray-300" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-gray-800 text-white border-red-900" required />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="species" :value="__('Especie')" class="text-gray-300" />
                            <select id="species" name="species" class="mt-1 block w-full bg-gray-800 text-white border-red-900 rounded-md shadow-sm">
                                <option value="Cat">Gato</option>
                                <option value="Deer">Ciervo</option>
                                <option value="Pig">Cerdo</option>
                                <option value="Dog">Perro</option>
                                <option value="Wolf">Lobo</option>
                            </select>
                        </div>

                        <div>
                            <x-input-label for="joined_at" :value="__('Fecha de Adhesión')" class="text-gray-300" />
                            <x-text-input id="joined_at" name="joined_at" type="date" class="mt-1 block w-full bg-gray-800 text-white border-red-900" required />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="level" :value="__('Nivel de Poder')" class="text-gray-300" />
                            <x-text-input id="level" name="level" type="number" min="1" class="mt-1 block w-full bg-gray-800 text-white border-red-900" required />
                        </div>

                        <div>
                            <x-input-label for="loyalty_points" :value="__('Puntos de Lealtad')" class="text-gray-300" />
                            <x-text-input id="loyalty_points" name="loyalty_points" type="number" min="0" class="mt-1 block w-full bg-gray-800 text-white border-red-900" required />
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input id="is_elderly" name="is_elderly" type="checkbox" value="1" class="rounded bg-gray-800 border-red-900 text-red-600 shadow-sm focus:ring-red-500">
                        <label for="is_elderly" class="ml-2 text-sm text-gray-400">{{ __('¿Es un anciano del culto?') }}</label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4 bg-red-700 hover:bg-red-600">
                            {{ __('Añadir al Culto') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>