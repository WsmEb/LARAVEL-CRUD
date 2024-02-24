<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ Route::currentRouteName() }} | crud app</title>
    @vite('resources/css/app.css')

</head>
<body>
<header class="text-center py-5 bg-blue-500 text-white">
    <h1><a href="{{ url()->current() }}">{{ Route::currentRouteName() }}</a></h1>
</header>

<main class="p-5">
    @yield('content')
</main>

<footer class="text-center py-5 bg-blue-500 text-white">
</footer>
</body>
</html>
