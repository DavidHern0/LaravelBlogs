<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LaravelBlogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <h1 class="mx-auto"><a class="navbar-brand" href="/">LaravelBlogs</a></h1>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login.index') }}">Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register.index') }}">Register</a>
            </li>
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