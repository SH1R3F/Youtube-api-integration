<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Youtube') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">

                <h1 class="text-3xl mb-5">Videos</h1>
                <div class=" grid grid-cols-4 gap-3">
                    @foreach ($playlist->items as $item)
                        <!-- Playlist -->
                        <div
                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg w-full" src="{{ $item->snippet->thumbnails->default->url }}" />
                            </a>

                            <div class="p-5">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $item->snippet->title }}</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{ substr($item->snippet->description, 0, 30) }}...
                                </p>
                                <div class="flex justify-between items-center">
                                    <a href="{{ route('youtube.show', $item->snippet->resourceId->videoId) }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        View
                                    </a>
                                    <span
                                        class="text-gray-500">{{ Carbon\Carbon::parse($item->snippet->publishedAt)->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Playlist -->
                    @endforeach
                </div>
                <div class="flex justify-between mt-7">
                    @if (isset($playlist->prevPageToken))
                        <a href="{{ route('youtube.playlist', ['pageToken' => $playlist->prevPageToken, 'playlist' => $playlistId]) }}"
                            class="bg-blue-500 px-3 py-1 rounded-md text-white">Prev</a>
                    @else
                        <a></a>
                    @endif
                    @if (isset($playlist->nextPageToken))
                        <a href="{{ route('youtube.playlist', ['pageToken' => $playlist->nextPageToken, 'playlist' => $playlistId]) }}"
                            class="bg-blue-500 px-3 py-1 rounded-md text-white">Next</a>
                    @else
                        <a></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
