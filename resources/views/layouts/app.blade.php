<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand text-decoration-none" href="/">{{ __('LaravelBlogs') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <form class="form-inline my-2 my-lg-0 mb-3 mb-lg-0" action="{{ route('blog.search') }}" method="GET">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="{{ __('Search...') }}"
                            aria-label="{{ __('Search...') }}" name="search" id="search">
                        <div class="input-group-append">
                            <button class="button button-search" type="submit">
                                <img src="/images/searching_icon.svg" width="35" draggable="false">
                            </button>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav">
                    @if (auth()->check())
                        <li class="nav-item dropdown">
                            <a class="nav-link btn btn-link text-decoration-none dropdown-toggle" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" draggable="false">
                                {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="{{ route('blog.create') }}">{{ __('Create new blog') }}</a>
                                <a class="dropdown-item" href="{{ route('home.index') }}">{{ __('My blogs') }}</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">{{ __('Logout') }}</button>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-link text-decoration-none"
                                href="{{ route('login.index') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-link text-decoration-none"
                                href="{{ route('register.index') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </header>

    <nav class="container mt-4 text-center d-flex justify-content-center">
        <div class="d-flex flex-md-row flex-column flex-wrap align-content-center">
            <a class="button text-decoration-none text-white mb-2" href="/"
                draggable="false">{{ __('Latest blogs') }}</a>
            @if ($randomId)
                <a href="{{ route('blog.show', ['id' => $randomId]) }}"
                    class="button text-decoration-none text-white mb-2"
                    draggable="false">{{ __('See random blog') }}</a>
            @endif
            @auth
                <a class="button text-decoration-none text-white mb-2" href="{{ route('home.index') }}"
                    draggable="false">{{ __('My blogs') }}</a>
            @endauth
        </div>
    </nav>

    <main class="container mt-4">
        @yield('content')
    </main>
    <footer class="text-center mt-4">
        <p class="text-white">David Hernández Larrea &copy; {{ date('Y') }}</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
