<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-white">
    <div class="min-h-screen relative">
        <div class="fixed inset-0 -z-30 bg-gradient-to-br from-[#2a0a4a] via-[#14051f] to-[#05010a]"></div>

        <div class="fixed inset-0 -z-20 pointer-events-none overflow-hidden">
            <div class="absolute top-[-120px] left-[-80px] w-[320px] h-[320px] bg-pink-500/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-[-120px] right-[-80px] w-[320px] h-[320px] bg-blue-500/20 rounded-full blur-3xl"></div>
            <div class="absolute top-[20%] right-[20%] w-[220px] h-[220px] bg-purple-500/20 rounded-full blur-3xl"></div>
        </div>

        @include('layouts.navigation')

        <div class="relative z-10" style="padding-top: 110px;">
            @isset($header)
                <header class="mb-2">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>