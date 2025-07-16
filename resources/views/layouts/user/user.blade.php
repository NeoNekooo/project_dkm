<!DOCTYPE >
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} | @yield('title')</title>

    @vite('resources/css/app.css') @vite('resources/js/app.js')

    {{-- Font Awesome --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-white text-gray-900 antialiased">

    <x-navbar />
    @yield('content')

    <style>
        [x-cloak] { display: none !important; }
    </style>
<x-footer-dashboard />


</body>
</html>
