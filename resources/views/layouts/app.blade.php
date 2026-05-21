<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Coin Changer') }}@isset($title) — {{ $title }}@endisset</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans">
    <div class="flex min-h-screen">
        @include('layouts.partials.sidebar')

        <div class="flex flex-1 flex-col lg:pl-64">
            @include('layouts.partials.topbar')

            <main class="flex-1 p-6 lg:p-8">
                @if (session('success'))
                    <div class="mb-4 rounded-lg border border-emerald-800 bg-emerald-900/30 px-4 py-3 text-emerald-300">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 rounded-lg border border-red-800 bg-red-900/30 px-4 py-3 text-red-300">
                        {{ session('error') }}
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
