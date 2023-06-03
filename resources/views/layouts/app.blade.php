<!DOCTYPE html>
<html data-theme="pastel" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css'])
</head>

<body class="bg-base-200 font-sans antialiased">
    @include('layouts.app.alert')
    <div class="drawer drawer-mobile">
        <input id="sidebar-menu" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex min-h-screen flex-col justify-between p-4">
            <!-- Page content here -->
            <div class="">
                @include('layouts.app.navbar')
                <main class="mb-6">
                    {{ $slot }}
                </main>
            </div>
            @include('layouts.app.footer')

        </div>
        <div class="drawer-side bg-white">
            <label for="sidebar-menu" class="drawer-overlay"></label>

            @include('layouts.app.sidebar')
        </div>
    </div>

    @stack('modal')
    @vite(['resources/js/app.js'])
</body>

</html>
