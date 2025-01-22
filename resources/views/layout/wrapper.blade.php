<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boiler Central</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased overflow-x-hidden">
<div class="flex">
    <div class="md:flex-col w-2/12 p-4">
        @include('layout.nav')
    </div>
    <div class="md:flex-col w-10/12 p-5 m-5 rounded-2xl bg-gray-200">
        @yield('content')
    </div>
</div>
</body>
</html>

