<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrabble Club</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased overflow-x-hidden w-full h-full bg-green-800">
<div class="flex m-5">
    <div class="w-2/12">
        @include('layout.nav')
    </div>
    <div class="w-10/12 p-5 rounded-2xl bg-green-800">
        @yield('content')
    </div>
</div>
</body>
</html>

