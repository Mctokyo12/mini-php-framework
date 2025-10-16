<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{ BASE_PATH }}/">home</a>
            <a href="{{ BASE_PATH }}/about">About</a>
            <a href="{{ BASE_PATH }}/signup">inscription</a>
        </nav>
    </header>
    <br>
    <main>
       @yield("content")
    </main>
    <footer>
        <p>&copy; {{ date("Y") }}  My Mini Framework</p>
    </footer>
</body>
</html>