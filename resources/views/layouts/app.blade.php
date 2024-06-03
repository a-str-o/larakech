<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'List des contacts')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <style>
        [x-cloak] { display: none; }
    </style>
</head>
<body class="p-8 bg-gray-100 flex items-center justify-center min-h-screen " style="background-color: #f0f8ff;">
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        @yield('content')
    </div>
    <script src="{{ asset('/js/my_js.js') }}"></script>
</body>
</html>