@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="kaza">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ getTitle($title) }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        @vite(['resources/css/global.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen flex flex-col bg-gray-100">
        {{ $slot }}

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @stack('scripts')
    </body>
</html>
