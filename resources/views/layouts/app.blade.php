<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md custom-navbar shadow-sm mb-0 fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home">
                    Coffee<span class="shop-highlight">Shop</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link custom-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link custom-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle custom-link" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->
        <aside class="custom-sidebar">
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a class="nav-link" href="{{ url('/customer') }}">
                        <i class="bi bi-people-fill me-2"></i>{{ __('Pelanggan') }}
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="{{ url('/kategori') }}">
                        <i class="bi bi-tags-fill me-2"></i>{{ __('Kategori Produk') }}
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="{{ url('/supplayer') }}">
                        <i class="bi bi-truck me-2"></i>{{ __('Supplayer') }}
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="{{ url('/produk') }}">
                        <i class="bi bi-cup-fill me-2"></i>{{ __('Menu') }}
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="{{ url('/stok') }}">
                        <i class="bi bi-box-seam me-2"></i>{{ __('Stok') }}
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="{{ url('/order') }}">
                        <i class="bi bi-cart-fill me-2"></i>{{ __('Order') }}
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link" href="{{ url('/karyawan') }}">
                        <i class="bi bi-person-badge-fill me-2"></i>{{ __('Karyawan') }}
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>

    <!-- Custom CSS -->
    <style>
        /* Navbar Styles */
        .custom-navbar {
            background-color: #6e4d3b;
            padding: 1rem 2rem;
            z-index: 1000;
        }

        .custom-navbar .navbar-brand {
            color: #d9cbb3;
            font-size: 1.75rem;
            font-weight: bold;
        }

        .shop-highlight {
            color: #c4874d;
        }

        .custom-link {
            color: #d9cbb3;
        }

        .navbar-toggler {
            border-color: #c4874d;
        }

        /* Sidebar Styling */
        .custom-sidebar {
            background-color: #af8d66;
            color: #f1e0cc;
            position: fixed;
            top: 70px; /* Adjusted for fixed navbar height */
            left: 0;
            width: 250px;
            height: 100%;
            padding: 2rem;
            overflow-y: auto;
            z-index: 999;
        }

        .custom-sidebar .nav-link {
            color: #f1e0cc;
            font-size: 1.10rem;
            padding: 10px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .custom-sidebar .nav-link:hover {
            background-color: #795548;
            color: #d7b498;
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 250px; /* To make room for the sidebar */
            padding: 80px 20px 20px 20px; /* Added padding at top to make space for fixed navbar */
            background-color: #fdf5e6;
        }

        /* Typography */
        h1, h2, h3, p {
            color: #4e342e;
        }
    </style>
</body>

</html>
