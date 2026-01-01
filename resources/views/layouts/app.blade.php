<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Whispr') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- PWA -->
    <meta name="theme-color" content="#ffffff">
    <link rel="manifest" href="{{ asset('build/manifest.webmanifest') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-192x192.svg') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="{{ str_replace('.', '-', Route::currentRouteName() ?? '') }}">
    <div id="app">
        <script>
            // Apply theme immediately to prevent flash
            (function () {
                const savedTheme = localStorage.getItem('theme');
                // Removed prefersDark check to default to Light theme unless explicitly set to Dark
                if (savedTheme === 'dark') {
                    document.documentElement.setAttribute('data-theme', 'dark');
                }
            })();
        </script>
        @auth
            <!-- Desktop Sidebar -->
            <div class="sidebar d-none d-md-flex">
                <div class="mb-5 px-2">
                    <h3 class="fw-bold text-primary mb-0">Whispr.</h3>
                    <small class="text-muted">Your safe space</small>
                </div>

                <div class="flex-grow-1">
                    <a href="{{ route('home') }}" class="nav-link-custom {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                    <a href="{{ route('journal') }}"
                        class="nav-link-custom {{ request()->routeIs('journal') ? 'active' : '' }}">
                        <i class="bi bi-journal-text"></i> Journal
                    </a>
                    <a href="{{ route('chat') }}" class="nav-link-custom {{ request()->routeIs('chat') ? 'active' : '' }}">
                        <i class="bi bi-chat-dots"></i> Peer Chat
                    </a>
                    <a href="{{ route('crisis') }}"
                        class="nav-link-custom {{ request()->routeIs('crisis') ? 'active' : '' }}">
                        <i class="bi bi-heart-pulse"></i> Crisis Support
                    </a>
                    <a href="{{ route('profile') }}"
                        class="nav-link-custom {{ request()->routeIs('profile') ? 'active' : '' }}">
                        <i class="bi bi-person"></i> Profile
                    </a>
                </div>

                <div class="mt-auto">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="nav-link-custom text-danger">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

            <!-- Mobile Bottom Nav -->
            <div class="bottom-nav d-md-none">
                <a href="{{ route('home') }}" class="mobile-nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="bi bi-house-door{{ request()->routeIs('home') ? '-fill' : '' }}"></i>
                    <span>Home</span>
                </a>
                <a href="{{ route('journal') }}"
                    class="mobile-nav-item {{ request()->routeIs('journal') ? 'active' : '' }}">
                    <i class="bi bi-file-text{{ request()->routeIs('journal') ? '-fill' : '' }}"></i>
                    <span>Journal</span>
                </a>
                <a href="{{ route('chat') }}" class="mobile-nav-item {{ request()->routeIs('chat') ? 'active' : '' }}">
                    <i class="bi bi-chat-fill"></i>
                    <span>Chat</span>
                </a>
                <a href="{{ route('crisis') }}" class="mobile-nav-item {{ request()->routeIs('crisis') ? 'active' : '' }}">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span>Crisis</span>
                </a>
                <a href="{{ route('profile') }}"
                    class="mobile-nav-item {{ request()->routeIs('profile') ? 'active' : '' }}">
                    <i class="bi bi-person-fill"></i>
                    <span>Profile</span>
                </a>
            </div>
        @endauth

        <!-- Main Content -->
        <main class="@auth main-content @endauth">
            @guest
                <!-- Guest Navbar (Login/Register pages only) -->
                <nav class="navbar navbar-expand-md navbar-light glass-card m-3 d-md-none">
                    <div class="container">
                        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Whispr.</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
            @endguest

            @yield('content')
        </main>
    </div>
    @livewireScripts
</body>

</html>