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
    <header class="navbar navbar-expand navbar-dark d-flex justify-content-around align-items-baseline">
        <h1><a class="navbar-brand text-decoration-none" href="/">{{ __('LaravelBlogs') }}</a></h1>
        <ul class="navbar-nav">
            @if (auth()->check())
                <li class="nav-item dropdown">
                    <a class="nav-link btn btn-link text-decoration-none dropdown-toggle" href="#"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('blog.create') }}">{{ __('Create new blog') }}</a>
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
    </header>
    <nav class="navbar-expand d-flex justify-content-xl-center align-items-baseline mt-4">
        <a class="button navbar-brand text-decoration-none mx-5" href="/">{{ __('Latest blogs') }}</a>

        <a href="{{ route('blog.show', ['id' => $randomId]) }}"
            class="button navbar-brand text-decoration-none mx-5">{{ __('See random blog') }}</a>

        <a class="button navbar-brand text-decoration-none mx-5"
            href="{{ route('home.index') }}">{{ __('My blogs') }}</a>
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
