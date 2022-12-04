<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Youtube') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Playlists Fetch -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <form action="{{ route('youtube.playlists') }}" method="GET">
                    @csrf
                    <h1 class="text-3xl mb-5">Playlists fetcher</h1>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Channel ID
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="channel_id" type="text" placeholder="Channel ID" required>
                        @error('playlists_channel_id')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                        <button
                            class="mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1.5 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Fetch
                        </button>
                    </div>
                </form>
            </div><!-- Playlists Fetch -->
        </div>
    </div>
</x-app-layout>
