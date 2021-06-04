<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Gestiona tu negocio', 'Gestiona tu negocio') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-storage.js"></script>


    <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-analytics.js"></script>

    <script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyBp4qJ4deSqWuf2tzz7XvkZfou_FBYFF9c",
        authDomain: "gestionatunegociolaravel.firebaseapp.com",
        projectId: "gestionatunegociolaravel",
        storageBucket: "gestionatunegociolaravel.appspot.com",
        messagingSenderId: "17813845007",
        appId: "1:17813845007:web:e494fb0aef31c75b431f7a",
        measurementId: "G-2C2CV1ZVLT"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    </script>


    <script src="{{ asset('../resources/js/myJS.js') }}"></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('../resources/img/favicon/favicon.ico')  }}">



    <!--
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
    <link rel="icon" href="{{ asset('../resources/img/favicon/favicon.ico')  }}"> -->
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">

                @auth
                @if(\Auth::user()->rol == 'superadmin')

                <a class="navbar-brand" href="{{ url('/shops') }}">
                    {{ config('Gestiona tu negocio', 'Gestiona tu negocio') }}
                </a>

                @else

                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('Gestiona tu negocio', 'Gestiona tu negocio') }}
                </a>

                @endif

                @endauth
                @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('Gestiona tu negocio', 'Gestiona tu negocio') }}
                </a>
                @endguest

                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- <ul class="navbar-nav mr-auto">

                    </ul> -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="button" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="button" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                        @endif
                        @else
                        @if(\Auth::user()->rol == 'superadmin')
                        <li class="nav-item">
                            <a class="button" href="{{ route('shops') }}">
                                {{ __('Tiendas') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="button" href="{{ route('employers') }}">
                                {{ __('Empleados') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        @elseif(\Auth::user()->restablished)

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="button" href="{{ route('home') }}">
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="button" href="{{ route('employers') }}">
                                {{ __('Empleados') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(\Auth::user()->rol == 'propietario')
                                <a class="dropdown-item" href={{ route('shop', [Auth::user()->workAt]) }}>
                                    {{ __('Tienda') }}
                                </a>
                                <hr>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        @endif

                        @endguest
                    </ul>
                    <!-- Mi código -->
                    <div class="burger ml-auto">
                        <div class="line1"></div>
                        <div class="line2"></div>
                        <div class="line3"></div>
                    </div>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('../resources/js/hamburguerMenu.js') }}"></script>

</body>
<footer class="py-4 bg-dark">
        <div class="container px-5">
            <p class="text-center text-white">Si tienes cualquer problema, ponte en contacto con nosotros a través de <a href="mailto:gestionatunegocioccr@gmail.com">gestionatunegocioccr@gmail.com</a> </p>    
            <p class="m-0 text-center text-white">Copyright &copy; Gestiona Tu Negocio 2021</p>
        </div>
        </footer>

</html>