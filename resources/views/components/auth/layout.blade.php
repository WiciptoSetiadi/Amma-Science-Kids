<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} · Amma Science Kids</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="auth-page font-sans antialiased">
    {{ $slot }}
</body>
</html>
