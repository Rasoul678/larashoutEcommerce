<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1>Store</h1>
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav category">
                        @foreach($categories as $cat)
                            @foreach($cat->items as $category)
                                @if ($category->items->count() > 0)
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="{{ route('category.show', $category->slug) }}" id="{{ $category->slug }}"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                                        <div class="dropdown-menu" aria-labelledby="{{ $category->slug }}">
                                            @foreach($category->items as $item)
                                                <a class="dropdown-item" href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a>
                                            @endforeach
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><h4><strong>{{ __('Login') }}</strong></h4> </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><h4><strong>{{ __('Sign Up') }}</strong></h4></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <h4>
                                        <strong>
                                            Cart
                                            <span class="badge badge-primary">{{ $cartCount == 0 ? '' : $cartCount }}</span>
                                        </strong>
                                    </h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#Profile">
                                    <h4>{{ Auth::user()->full_name }}</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <h4><strong>{{ __('Logout') }}</strong></h4>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="page-footer font-small bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col m-4">
                    <h4>Customer Service</h4>
                </div>
                <div class="col m-4">
                    <h4>About</h4>
                    <h5> This is an online store, you can find us here in case you want something exotic</h5>
                </div>
                <div class="col m-4">
                    <h3>Contacts</h3>
                    <h5>Address : No. 5, Sarv Street, Valiasr Ave., Tehran, IRAN</h5>
                    <h5>Postal Code : 1968956193</h5>
                    <h5>Tel : +98 21 88662300</h5>
                    <h5>E-Mail : Info@paraye.com</h5>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
