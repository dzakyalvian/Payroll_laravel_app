<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-foreground bg-background selection:bg-primary selection:text-primary-foreground">
        <div x-data="{ sidebarOpen: false }" class="flex min-h-dvh overflow-hidden bg-background"">
            
            <livewire:layout.navigation />

            <div class="relative flex min-w-0 flex-1 flex-col overflow-y-auto bg-background">
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="py-8 px-8 lg:pt-8 pt-24">
                        {{ $header }}
                    </header>
                @endif

                <!-- Page Content -->
                <main class="flex-1 w-full p-6 lg:p-8 {{ !isset($header) ? 'pt-24 lg:pt-8' : '' }}">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
