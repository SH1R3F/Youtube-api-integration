<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo&family=Inconsolata&family=Kenia&family=Roboto+Mono:wght@400;700&display=swap"
        rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: Cairo, sans-serif;
        }
    </style>
</head>

<body class="bg-king-50">

    <!-- Navbar -->
    <div class="absolute top-0 right-0 left-0 shadow-sm">
        <div class="container">
            <nav class="flex justify-between items-center py-4">
                <a href="/" class="font-kenya text-4xl text-king-400">Social King</a>
                <ul class="flex gap-6">
                    <li class="pb-1 border-king-100 transition-all hover:border-b">
                        <a href="{{ route('login') }}" class="text-king-400">Login</a>
                    </li>
                    <li class="pb-1 border-king-100 transition-all hover:border-b">
                        <a href="{{ route('register') }}" class="text-king-400">Register</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div><!-- Navbar -->


    <!-- Header -->
    <header class="h-screen"
        style="background: linear-gradient(#00000070,#00000070), url('{{ asset('images/header.jpg') }}'); background-size: cover;">
        <div class="flex items-center justify-center h-full px-10">
            <div class="text-center">
                <h1 class="text-5xl font-roboto font-semibold text-white mb-10">Collecting data from social media
                    became so
                    much
                    easier</h1>
                <a href="{{ route('register') }}"
                    class="py-2 px-6 bg-king-300 text-slate-800 rounded-md hover:shadow-xl">Try
                    now</a>
            </div>
        </div>
    </header><!-- Header -->


</body>

</html>
