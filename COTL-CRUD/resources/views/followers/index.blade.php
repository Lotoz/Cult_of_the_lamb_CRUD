<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-red-600 leading-tight uppercase tracking-widest">
                {{ __('Cult Followers') }}
            </h2>
            <a href="{{ route('followers.create') }}" class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                {{ __('Recruit New') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-black min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="mb-6 p-4 bg-green-900 border border-green-600 text-green-200 rounded-lg">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg border border-red-900">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-red-900 text-white uppercase text-sm leading-normal">
                            <th class="py-3 px-6">Follower</th>
                            <th class="py-3 px-6">Species</th>
                            <th class="py-3 px-6 text-center">Level</th>
                            <th class="py-3 px-6 text-center">Loyalty</th>
                            <th class="py-3 px-6 text-center">Status</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-300 text-sm font-light">
                        @forelse($followers as $follower)
                        <tr class="border-b border-red-900/30 hover:bg-red-900/10 transition-colors">
                            <td class="py-3 px-6 font-bold text-white">
                                {{ $follower->name }}
                            </td>
                            <td class="py-3 px-6">
                                <span class="bg-gray-800 text-red-400 py-1 px-3 rounded-full border border-red-900/50">
                                    {{ $follower->species }}
                                </span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="text-yellow-500 font-mono">⚡ {{ $follower->level }}</span>
                            </td>
                            <td class="py-3 px-6 text-center text-red-400">
                                ♥ {{ $follower->loyalty_points }}
                            </td>
                            <td class="py-3 px-6 text-center">
                                @if($follower->is_elderly)
                                <span class="text-gray-500 italic">Elder</span>
                                @else
                                <span class="text-green-500">Young</span>
                                @endif
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center space-x-4">
                                    <a href="{{ route('followers.edit', $follower) }}" class="text-yellow-600 hover:text-yellow-400 transform hover:scale-110">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('followers.destroy', $follower) }}" method="POST" onsubmit="return confirm('Are you sure you want to sacrifice {{ $follower->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-400 transform hover:scale-110">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-10 text-center text-gray-500 uppercase tracking-widest">
                                Your cult is empty. Go forth and recruit new followers.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>