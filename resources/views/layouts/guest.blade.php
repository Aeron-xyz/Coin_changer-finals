<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Coin Changer') }} — Sign In</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans">
    <div class="min-h-screen flex flex-col items-center justify-center bg-zinc-950 px-4">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white">
                Coin <span class="text-red-500">Changer</span>
            </h1>
            <p class="mt-2 text-zinc-400">Tracking System</p>
        </div>

        <div class="w-full max-w-md rounded-2xl border border-zinc-800 bg-zinc-900 p-8 shadow-2xl">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
