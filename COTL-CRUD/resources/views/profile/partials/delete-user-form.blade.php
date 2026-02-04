<section class="space-y-6">
    <header>
        <h2 class="text-xl font-black text-red-600 uppercase tracking-widest drop-shadow-[0_0_5px_rgba(220,38,38,0.5)]">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-900/50 border border-red-600 text-red-100 hover:bg-red-800 hover:shadow-[0_0_15px_rgba(220,38,38,0.6)] transition-all duration-300">{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-gray-900 border-2 border-red-900 text-white shadow-[0_0_50px_rgba(220,38,38,0.2)]">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-red-500 uppercase tracking-widest">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 bg-black border-red-900 text-white placeholder-gray-600 focus:border-red-500 focus:ring-red-500"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="bg-black border-gray-700 text-gray-300 hover:bg-gray-800 hover:text-white">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3 bg-red-700 hover:bg-red-600 border border-red-500 shadow-[0_0_10px_rgba(220,38,38,0.5)]">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>