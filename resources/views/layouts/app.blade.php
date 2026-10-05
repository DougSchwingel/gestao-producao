<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Gestão de Produção')</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
        rel="stylesheet"
    />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="app-shell">

        <aside id="sidebar" class="app-sidebar">
            <div class="sidebar-header">
                <span class="sidebar-title">Gestão</span>

                <button id="sidebarToggle" class="sidebar-toggle" type="button">
                    <span class="material-symbols-outlined">
                        menu
                    </span>
                </button>
            </div>

            <nav class="sidebar-nav">

                <a href="/dashboard" class="sidebar-link">
                    <span class="material-symbols-outlined sidebar-icon">
                        home
                    </span>

                    <span class="sidebar-text">
                        Dashboard
                    </span>
                </a>

                <a href="#" class="sidebar-link">
                    <span class="material-symbols-outlined">
                        group
                    </span>
                    <span class="sidebar-text">Clientes</span>
                </a>

                <a href="#" class="sidebar-link">
                    <span class="material-symbols-outlined">
                        inventory_2
                    </span>
                    <span class="sidebar-text">Produtos</span>
                </a>

                <a href="#" class="sidebar-link">
                    <span class="material-symbols-outlined">
                        warehouse
                    </span>
                    <span class="sidebar-text">Estoque</span>
                </a>

                <a href="#" class="sidebar-link">
                    <span class="material-symbols-outlined">
                        request_quote
                    </span>
                    <span class="sidebar-text">Orçamentos</span>
                </a>

            </nav>
        </aside>

        <div class="app-main">

            <header class="app-topbar">
                <strong>@yield('page-title', 'Dashboard')</strong>

                <div class="d-flex align-items-center gap-3">
                    <span>{{ Auth::user()->name }}</span>

                    <form action="/logout" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-outline-light btn-sm">
                            Sair
                        </button>
                    </form>
                </div>
            </header>

            <main class="app-content">
                @yield('content')
            </main>

        </div>

    </div>

</body>
</html>