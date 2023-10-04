<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <h1 class="mx-auto"><a class="navbar-brand" href="/">LaravelBlogs</a></h1>
        <ul class="navbar-nav mx-auto">
        @if (auth()->check())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home.index') }}">{{__('My blogs')}}</a>
            </li>
            <li class="nav-item">    
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="session-button" type="submit">{{__('Logout')}}</button>
                </form>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login.index') }}">{{__('Login')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register.index') }}">{{__('Register')}}</a>
            </li>
        @endif
        </ul>
    </header>
    
    <main class="container mt-4">
        @yield('content')
    </main>

    <footer class="text-center mt-4">
        <p>David Hernández Larrea &copy; {{ date('Y') }}</p>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>