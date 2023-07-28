<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | Learning Leravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>
<body>
    @yield('content')
</body>
</html>
