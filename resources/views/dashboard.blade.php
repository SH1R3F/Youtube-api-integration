<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="grid grid-cols-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-3 px-4">
                    <a href="/youtube">
                        <h1 class="text-3xl text-gray-700 mb-3">Youtube</h1>
                        <p class="text-gray-700 mb-3">Here you can find youtube scripts</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
