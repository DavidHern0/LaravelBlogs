<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LaravelBlogs</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1><a href="/">LaravelBlogs</a></h1>
        
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="session-button" type="submit">{{__('Log Out')}}</button>
        </form>
    </header>
    <main>
        @yield('content')
    </main>

    <footer>
        <p>David Hernández Larrea &copy; {{ date('Y') }}</p>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>