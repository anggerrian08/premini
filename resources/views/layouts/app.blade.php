<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="resources/css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-black bg-secondary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#" style="font-size: 1.5rem; font-weight: bold; color: #173B45;">
                    <style="height: 40px;">
                    CoffeeShop
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @auth
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <!-- Menu items here -->
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
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
                @endauth
            </div>
        </nav>

        <div class="container-fluid">
            <style>
                .sidebar {
                    background-color: #454647;
                    padding: 20px;
                    border-right: 1px solid #ddd;
                }

                .sidebar .nav-link {
                    color: #8a6e11;
                    font-weight: bold;
                }

                .sidebar .nav-link:hover {
                    color: #697029;
                }
            </style>
            <div class="row">
                <!-- Sidebar -->
                <aside class="col-md-3 sidebar">

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/deskripsi') }}">{{ __('Tentang Kami') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/customer') }}">{{ __('Pelanggan') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/kategori') }}">{{ __('Kategori produk') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/supplayer') }}">{{ __('Supplayer') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/produk') }}">{{ __('Menu') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/stok') }}">{{ __('Stok') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/order') }}">{{ __('Order') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/karyawan') }}">{{ __('Karyawan') }}</a>
                        </li>
                    </ul>

                    <!-- Optional: Move the table to the sidebar if needed -->

                </aside>

                <!-- Main Content -->
                <main class="col-md-9 py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>
