<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div id="app" class="w-full lg:w-container border border-solid border-gray lg:mx-auto">
            <header>
                <nav class="bg-white w-full lg:w-container-child py-2 px-3 border-b border-solid border-gray flex justify-between items-baseline fixed z-20">
                    <a href="#" class="text-xl font-bold">Home</a>
                    @auth
                        <a href="#" class="text-blue text-sm hover:underline" @click.prevent="logout">Logout</a>
                    @endauth
                </nav>
            </header>
            <!-- Page Content -->
            <main class="mt-10">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
