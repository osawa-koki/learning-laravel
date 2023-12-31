<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | Learning Leravel</title>
    <link rel="icon" href="/tako.png" />
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>
<body>
    @yield('content')
    <div class="d-flex">
        <a href="/" class="btn btn-outline-primary m-2"># Home</a>
        <a href="{{ route('prefectures.index') }}" class="btn btn-outline-primary m-2"># Prefectures</a>
        <a href="{{ route('foods.index') }}" class="btn btn-outline-primary m-2"># Foods</a>
    </div>
    <footer class="w-100 d-flex justify-content-center align-items-center p-5 bg-secondary bg-gradient">
        <a class="text-light" href="https://github.com/osawa-koki" target="_blank" rel="noopener noreferrer">@osawa-koki</a>
    </footer>
</body>
</html>
