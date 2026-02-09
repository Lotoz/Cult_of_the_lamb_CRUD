<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-purple-500 leading-tight uppercase tracking-widest">
            {{ __('Leader Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black min-h-screen relative">
        <div class="fixed top-20 right-0 w-96 h-96 bg-purple-900/20 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="fixed bottom-0 left-0 w-96 h-96 bg-red-900/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8 relative z-10">

            <div class="p-4 sm:p-8 bg-gray-900 shadow-[0_0_20px_rgba(168,85,247,0.15)] sm:rounded-lg border border-purple-900/50 backdrop-blur-sm relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-purple-600/10 rounded-full blur-2xl -mr-16 -mt-16"></div>
                <div class="max-w-xl relative">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-gray-900 shadow-[0_0_20px_rgba(168,85,247,0.15)] sm:rounded-lg border border-purple-900/50 backdrop-blur-sm relative overflow-hidden">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-black border-2 border-red-900/60 shadow-[0_0_30px_rgba(220,38,38,0.2)] sm:rounded-lg relative overflow-hidden">
                <div class="absolute inset-0 bg-red-900/5 pointer-events-none animate-pulse"></div>

                <div class="max-w-xl relative z-10">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>