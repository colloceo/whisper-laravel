<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Whispr</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-light">
    <div id="app" class="d-flex">
        <!-- Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-white shadow-sm"
            style="width: 250px; height: 100vh; position: fixed;">
            <a href="{{ route('admin.dashboard') }}"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <i class="bi bi-shield-lock-fill fs-3 text-primary me-2"></i>
                <span class="fs-4 fw-bold">Admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::is('admin.dashboard') ? 'active' : 'link-dark' }}"
                        aria-current="page">
                        <i class="bi bi-speedometer2 me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users') }}"
                        class="nav-link {{ Route::is('admin.users') ? 'active' : 'link-dark' }}">
                        <i class="bi bi-people me-2"></i>
                        User Management
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.chat_rooms') }}"
                        class="nav-link {{ Route::is('admin.chat_rooms') ? 'active' : 'link-dark' }}">
                        <i class="bi bi-chat-quote me-2"></i>
                        Chat Rooms
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.resources') }}"
                        class="nav-link {{ Route::is('admin.resources') ? 'active' : 'link-dark' }}">
                        <i class="bi bi-life-preserver me-2"></i>
                        Crisis Resources
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.reports') }}"
                        class="nav-link {{ Route::is('admin.reports') ? 'active' : 'link-dark' }}">
                        <i class="bi bi-flag me-2"></i>
                        Message Reports
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                    id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->anonymous_username }}&background=random"
                        alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>{{ Auth::user()->anonymous_username }}</strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="{{ route('home') }}">Back to Site</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Sign out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4" style="margin-left: 250px;">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>

</html>