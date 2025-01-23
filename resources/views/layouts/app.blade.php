<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>
<body class="bg-gray-100">
    <div class="font-sans text-gray-900 antialiased">
        <div class="flex flex-col sm:justify-center items-center pt-5 pb-5">
            <h2 class="font-bold text-2xl">{{ config('app.name') }}</h2>

            <div class="w-full sm:max-w-2xl mt-6 mb-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                @livewire('cart-counter')
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @livewireScripts
</body>
</html>
