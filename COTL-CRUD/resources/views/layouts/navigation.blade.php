<nav x-data="{ open: false }" class="bg-black/90 backdrop-blur-md border-b border-red-900/60 shadow-[0_4px_20px_rgba(220,38,38,0.1)] sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-red-600 drop-shadow-[0_0_8px_rgba(220,38,38,0.6)]" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-400 hover:text-red-500 focus:text-red-600 transition-colors duration-300">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('followers.index')" :active="request()->routeIs('followers.*')" class="text-gray-400 hover:text-red-500 focus:text-red-600 transition-colors duration-300">
                        {{ __('My Followers') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-red-900 text-sm leading-4 font-medium rounded-md text-red-500 bg-gray-900 hover:text-purple-400 hover:border-purple-600 focus:outline-none transition-all duration-300 shadow-inner group">
                            <div class="font-bold tracking-widest uppercase group-hover:text-purple-300">{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 group-hover:text-purple-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-gray-900 border border-purple-900/50">
                            <x-dropdown-link :href="route('profile.edit')" class="text-gray-400 hover:bg-purple-900/20 hover:text-purple-400 transition-colors">
                                {{ __('Leader Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    class="text-gray-400 hover:bg-red-900/20 hover:text-red-500 transition-colors border-t border-gray-800"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Abandon Cult') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-red-600 hover:text-purple-500 hover:bg-gray-900 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-900 border-t border-red-900/50">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-400 hover:text-purple-400 hover:bg-purple-900/10 hover:border-purple-500">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('followers.index')" :active="request()->routeIs('followers.*')" class="text-gray-400 hover:text-purple-400 hover:bg-purple-900/10 hover:border-purple-500">
                {{ __('My Followers') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-red-900/30">
            <div class="px-4">
                <div class="font-medium text-base text-purple-500">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-400 hover:text-purple-400 hover:bg-purple-900/10">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        class="text-red-400 hover:text-red-500 hover:bg-red-900/10"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>