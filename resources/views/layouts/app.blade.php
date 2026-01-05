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
                <div class="flex-grow-1">
                    <a href="{{ route('home') }}" wire:navigate
                        class="nav-link-custom {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                    <a href="{{ route('journal') }}" wire:navigate
                        class="nav-link-custom {{ request()->routeIs('journal') ? 'active' : '' }}">
                        <i class="bi bi-journal-text"></i> Journal
                    </a>
                    <a href="{{ route('chat') }}" wire:navigate
                        class="nav-link-custom {{ request()->routeIs('chat') ? 'active' : '' }}">
                        <i class="bi bi-chat-dots"></i> Peer Chat
                    </a>
                    <a href="{{ route('crisis') }}" wire:navigate
                        class="nav-link-custom {{ request()->routeIs('crisis') ? 'active' : '' }}">
                        <i class="bi bi-heart-pulse"></i> Crisis Support
                    </a>
                    <a href="{{ route('profile') }}" wire:navigate
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
                <a href="{{ route('home') }}" wire:navigate
                    class="mobile-nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="bi bi-house-door{{ request()->routeIs('home') ? '-fill' : '' }}"></i>
                    <span>Home</span>
                </a>
                <a href="{{ route('journal') }}" wire:navigate
                    class="mobile-nav-item {{ request()->routeIs('journal') ? 'active' : '' }}">
                    <i class="bi bi-file-text{{ request()->routeIs('journal') ? '-fill' : '' }}"></i>
                    <span>Journal</span>
                </a>
                <a href="{{ route('chat') }}" wire:navigate
                    class="mobile-nav-item {{ request()->routeIs('chat') ? 'active' : '' }}">
                    <i class="bi bi-chat-fill"></i>
                    <span>Chat</span>
                </a>
                <a href="{{ route('crisis') }}" wire:navigate
                    class="mobile-nav-item {{ request()->routeIs('crisis') ? 'active' : '' }}">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span>Crisis</span>
                </a>
                <a href="{{ route('profile') }}" wire:navigate
                    class="mobile-nav-item {{ request()->routeIs('profile') ? 'active' : '' }}">
                    <i class="bi bi-person-fill"></i>
                    <span>Profile</span>
                </a>
            </div>
        @endauth

        <div class="main-wrapper">
            @if(!request()->routeIs('chat.room'))
                <header class="global-header-wrapper shadow-sm">
                    <div class="global-header">
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <!-- Left side: Brand info -->
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <h4 class="fw-bold mb-0 brand-text"
                                            style="font-family: 'Poppins', sans-serif; line-height: 1;">Whispr.</h4>
                                        <span class="mx-2 text-muted opacity-50 tagline">|</span>
                                        <h5 class="mb-0 brand-text fw-medium"
                                            style="font-family: 'Poppins', sans-serif; font-size: 1rem;">
                                            @yield('page_title', 'Dashboard')</h5>
                                    </div>
                                    <small class="text-muted d-none d-sm-block tagline"
                                        style="font-size: 0.7rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">Your
                                        Safe Space</small>
                                </div>
                            </div>

                            <!-- Right side: Utility Icons -->
                            <div class="d-flex align-items-center gap-2">
                                @auth
                                    <livewire:notifications-dropdown />
                                @endauth

                                <button class="btn btn-link text-dark p-1 border-0 shadow-none" id="theme-toggle"
                                    onclick="let theme = document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark'; document.documentElement.setAttribute('data-theme', theme); localStorage.setItem('theme', theme); if(window.renderMoodChart) window.renderMoodChart();">
                                    <i class="bi bi-moon fs-5"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </header>
            @endif

            <!-- Main Scrollable Content -->
            <main class="content-scroll-area">
                @yield('content')
            </main>
        </div>
    </div>
    @livewireScripts
    @stack('scripts')
</body>

</html>