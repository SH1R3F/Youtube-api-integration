<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo&family=Inconsolata&family=Kenia&family=Roboto+Mono:wght@400;700&display=swap"
        rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-king-50">
    <!-- Navbar -->
    <div class="absolute top-0 right-0 left-0">
        <div class="container">
            <nav class="flex justify-between items-center py-4">
                <a href="/" class="font-kenya text-4xl text-king-200">Social King</a>
                <ul class="flex gap-6">
                    <li class="pb-1 border-king-100 transition-all hover:border-b">
                        <a href="{{ route('login') }}" class="text-king-200">Login</a>
                    </li>
                    <li class="pb-1 border-king-100 transition-all hover:border-b">
                        <a href="{{ route('register') }}" class="text-king-200">Register</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div><!-- Navbar -->
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
</body>

</html>
