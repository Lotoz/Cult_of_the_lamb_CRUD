<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-black text-red-600 uppercase tracking-widest">Nuevo Pacto de Líder</h2>
        <p class="text-gray-500 text-xs uppercase">Únete al culto eterno</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nombre del Líder')" class="text-gray-400" />
            <x-text-input id="name" class="block mt-1 w-full bg-gray-900 border-red-900 text-white focus:ring-red-600" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Identidad (Email)')" class="text-gray-400" />
            <x-text-input id="email" class="block mt-1 w-full bg-gray-900 border-red-900 text-white" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="leader_type" :value="__('Naturaleza del Líder')" class="text-gray-400" />
            <select id="leader_type" name="leader_type" class="block mt-1 w-full bg-gray-900 border-red-900 text-red-500 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50">
                <option value="Lamb">The Lamb (Cordero)</option>
                <option value="Goat">The Goat (Cabra)</option>
            </select>
            <x-input-error :messages="$errors->get('leader_type')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Contraseña')" class="text-gray-400" />
            <x-text-input id="password" class="block mt-1 w-full bg-gray-900 border-red-900 text-white" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-gray-400" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-900 border-red-900 text-white" type="password" name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="underline text-sm text-gray-500 hover:text-red-400" href="{{ route('login') }}">
                {{ __('¿Ya tienes un pacto?') }}
            </a>

            <x-primary-button class="ms-4 bg-red-700 hover:bg-red-600 border-red-500">
                {{ __('Sellar Pacto') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>