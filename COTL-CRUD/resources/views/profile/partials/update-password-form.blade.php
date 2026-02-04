<section>
    <header>
        <h2 class="text-xl font-bold text-purple-500 uppercase tracking-widest">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-purple-300 uppercase text-xs" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full bg-black border-purple-900 text-white focus:border-purple-500 focus:ring-purple-500 placeholder-gray-600"
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-purple-300 uppercase text-xs" />
            <x-text-input id="update_password_password" name="password" type="password"
                class="mt-1 block w-full bg-black border-purple-900 text-white focus:border-purple-500 focus:ring-purple-500 placeholder-gray-600"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-purple-300 uppercase text-xs" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full bg-black border-purple-900 text-white focus:border-purple-500 focus:ring-purple-500 placeholder-gray-600"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-purple-800 hover:bg-purple-600 border border-purple-500 shadow-[0_0_10px_rgba(168,85,247,0.4)] transition-all">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-green-400 font-bold uppercase tracking-widest">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>