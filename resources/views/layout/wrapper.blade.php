<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrabble Club</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased overflow-x-hidden">
<div class="flex">
    <div class="md:flex-col w-2/12">
        @include('layout.nav')
    </div>
    <div class="md:flex-col w-10/12">
        @yield('content')
    </div>
</div>
</body>
</html>

