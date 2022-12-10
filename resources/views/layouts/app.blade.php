<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/assets/img/fav_wanagis.jpg') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        WANAGIS
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/now-ui-kit.css') }}" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @livewireStyles
    @stack('styles')
</head>

<body>

    <body class="landing-page sidebar-collapse">
        <nav class="navbar navbar-expand-lg bg-success fixed-top navbar-transparent " color-on-scroll="400">
            <div class="container">
                <div class="dropdown button-dropdown">
                    <img src="{{ asset('/assets/img/wanagis.png') }}" width="50" height="50">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-header">Dropdown header</a>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">One more separated link</a>
                    </div>
                </div>
                <div class="navbar-translate">
                    <a class="navbar-brand" href="/" rel="tooltip" title="Dibuat oleh Zaidan Al-ghifari Fahlevi"
                        data-placement="bottom" target="_blank">
                        WANAGIS </a>
                    <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar top-bar"></span>
                        <span class="navbar-toggler-bar middle-bar"></span>
                        <span class="navbar-toggler-bar bottom-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation"
                    data-nav-image="../assets/img/blurred-image-1.jpg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/map">Peta</a>
                        </li>
                        @if (Auth::check() && Auth::user()->hasRole('admin'))
                            <li class="nav-item">
                                <a class="nav-link" href="/users">User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/settings">Pengaturan</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="/about">Tentang</a>
                        </li>
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
                                    <a class="nav-link dropdown-toggle" href="#"
                                        id="navbarDropdownMenuLink"data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ Auth::user()->name }}</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    </a>

                    </div>
                    </li>
                @endguest
                </ul>
                </ul>
            </div>
            </div>
        </nav>
        <!-- End Navbar -->
        @yield('content')
    </body>

    <script src="{{ asset('/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/nouislider.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/assets/js/now-ui-kit.min.js') }}"></script>
    @livewireScripts
    @stack('scripts')
</body>
