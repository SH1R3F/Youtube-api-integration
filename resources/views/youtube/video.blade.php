<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Youtube') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Video show -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10 mb-5">
                <h1 class="text-3xl mb-5">{{ $video->items[0]->snippet->title }}</h1>
                <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/{{ $video->items[0]->id }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

                <h1 class="text-3xl my-3">
                    {{ $video->items[0]->snippet->channelTitle }}
                </h1>

                <h3 class="text-xl mt-3 mb-1 underline">Description</h3>
                <p class="mb-7 text-gray-500 whitespace-pre-line">{{ $video->items[0]->snippet->description }}</p>
                <div class="text-right text-sm text-gray-500">
                    {{ Carbon\Carbon::parse($video->items[0]->snippet->publishedAt)->format('d/m/Y') }}</div>
            </div><!-- Video show -->

        </div>
    </div>
</x-app-layout>
