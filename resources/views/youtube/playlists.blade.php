<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Youtube') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">

                <h1 class="text-3xl mb-5">Channel info</h1>

                <div class="overflow-x-auto relative">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Channel Name
                                </th>
                                <td class="py-4 px-6">
                                    {{ $channel->items[0]->snippet->title }}
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Channel Description
                                </th>
                                <td class="py-4 px-6">
                                    {{ $channel->items[0]->snippet->description }}
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Statistics
                                </th>
                                <td class="py-4 px-6">
                                    Video count: {{ $channel->items[0]->statistics->videoCount }} <br />
                                    Views count: {{ $channel->items[0]->statistics->viewCount }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr class="my-5">

                <h1 class="text-3xl mb-5">Playlists</h1>
                <div class=" grid grid-cols-4 gap-3">
                    @foreach ($playlists->items as $item)
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
                                    {{ $item->snippet->description }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <a href="{{ route('youtube.playlist', $item->id) }}" target="_blank"
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
                    @if (isset($playlists->prevPageToken))
                        <a href="{{ route('youtube.playlists', ['pageToken' => $playlists->prevPageToken, 'channel_id' => $channelId]) }}"
                            class="bg-blue-500 px-3 py-1 rounded-md text-white">Prev</a>
                    @else
                        <a></a>
                    @endif
                    @if (isset($playlists->nextPageToken))
                        <a href="{{ route('youtube.playlists', ['pageToken' => $playlists->nextPageToken, 'channel_id' => $channelId]) }}"
                            class="bg-blue-500 px-3 py-1 rounded-md text-white">Next</a>
                    @else
                        <a></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
