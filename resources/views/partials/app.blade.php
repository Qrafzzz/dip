<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>

</head>
<body>
<div class="text-lg bg-ecece min-h-screen">
    @yield('content')
</div>

</body>
</html>

