<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Autenticação')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <main class="min-vh-100 d-flex align-items-center justify-content-center">
        @yield('content')
    </main>

    @yield('scripts')

</body>
</html>