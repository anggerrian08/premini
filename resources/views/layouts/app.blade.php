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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('fonts/nunito-v9-latin-600.eot') }}" rel="stylesheet">


</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md custom-navbar shadow-sm mb-0">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    Coffee<span class="shop-highlight">Shop</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Add more links here if necessary -->
                    </ul>

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
                                        {{ __('Logout') }}
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

        <!-- Custom CSS -->
        <style>
            /* Navbar Styles */
            .custom-navbar {
                background-color: #2c3e50; /* Darker navy blue background */
                padding: 1rem 2rem;
            }

            .custom-navbar .navbar-brand {
                color: #ecf0f1; /* Light color for brand name */
                font-size: 1.75rem;
                font-weight: bold;
                transition: color 0.3s;
            }

            .custom-navbar .navbar-brand:hover {
                color: #f39c12; /* Hover color for brand name */
            }

            .shop-highlight {
                color: #f39c12; /* Highlighting the "Shop" in CoffeeShop */
            }

            .custom-link {
                color: #ecf0f1; /* Default color for links */
                font-size: 1rem;
                margin-right: 1rem;
                transition: color 0.3s;
            }

            .custom-link:hover {
                color: #f39c12; /* Hover effect for links */
            }

            .navbar-toggler {
                border-color: #f39c12;
            }

            .navbar-toggler-icon {
                color: #ecf0f1;
            }

            /* Dropdown Styles */
            .dropdown-menu {
                background-color: #34495e; /* Darker background for dropdown */
                border: none;
            }

            .dropdown-item {
                color: #ecf0f1; /* Light color for dropdown items */
                transition: background-color 0.3s, color 0.3s;
            }

            .dropdown-item:hover {
                background-color: #f39c12;
                color: #fff;
            }
        </style>


        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <aside class="col-md-3 custom-sidebar p-4 min-vh-100 border-end">
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
                <main class="col-md-9 py-4">
                    @yield('content')
                </main>
            </div>

            <!-- Custom CSS -->
            <style>
                /* Sidebar Styling */
                .custom-sidebar {
                    background-color: #343a40; /* Dark background for sidebar */
                    color: #f8f9fa; /* Light text color */
                    border-right: 1px solid #ccc; /* Border between sidebar and main content */
                }

                .custom-sidebar .nav-link {
                    color: #f8f9fa; /* Default color for sidebar links */
                    font-size: 1rem;
                    padding: 10px;
                    display: flex;
                    align-items: center;
                    transition: background-color 0.3s ease, color 0.3s ease;
                }

                .custom-sidebar .nav-link:hover {
                    background-color: #495057; /* Darker background on hover */
                    color: #f39c12; /* Golden color on hover */
                }

                .custom-sidebar .nav-item {
                    margin-bottom: 15px; /* Spacing between links */
                }

                .custom-sidebar i {
                    font-size: 1.2rem;
                    margin-right: 10px; /* Spacing between icon and text */
                }

                /* Main Content Styling */
                main {
                    background-color: #fff; /* Light background for main content */
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
                }

                /* Typography */
                h1, h2, h3, p {
                    color: #343a40;
                }
            </style>

        </div>
    </div>
</body>

</html>
