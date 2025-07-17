<!DOCTYPE html>
<html lang="id" class="scroll-smooth" x-cloak>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $profil->nama }} | @yield('title', 'Dashboard') </title>
<link rel="icon" href="{{ asset('storage/' . $profil->logo) }}" type="image/x-icon">


    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/e686fa0059.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .nav-link-active {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50">
<div class="min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-3 px-6 flex justify-between items-center sticky top-0 z-50 w-full">
        <div class="flex items-center space-x-4">
            <button id="sidebarToggle"
                class="text-gray-600 hover:text-gray-900 md:hidden focus:outline-none focus:ring-2 focus:ring-green-500 rounded p-1 transition-colors"
                aria-label="Toggle menu" aria-expanded="false">
                <i class="fas fa-bars text-xl w-6 h-6 flex items-center justify-center"></i>
            </button>

            <!-- Logo / Brand -->
            <a href="{{ url('/') }}" class="flex items-center group">
                <img src="{{ asset('storage/' . ($profil->logo ?? 'default-logo.png')) }}"
                    alt="{{ $profil->nama ?? 'APP' }} Logo"
                    class="h-8 w-auto mr-2 transition-transform group-hover:scale-105">
                <span class="text-xl font-bold text-gray-800 group-hover:text-green-600 transition-colors">
                    {{ $profil->nama ?? env('APP_NAME') }}
                </span>
            </a>
        </div>

        <!-- Right Navbar -->
        <div class="flex items-center space-x-3">
            <a href="{{ url('/') }}"
                class="flex items-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                <i class="fas fa-home mr-2"></i>
                <span class="hidden sm:inline">Beranda</span>
            </a>
        </div>
    </nav>

    <!-- Wrapper -->
        <!-- Sidebar -->
        <aside id="sidebar"
             class="fixed top-[64px] left-0 h-[calc(100vh-64px)] w-64 bg-gradient-to-b from-green-700 to-green-800 text-white py-6 px-4 hidden md:block overflow-y-auto z-40">
            <!-- User Profile -->
            <div class="flex flex-col items-center mb-8">
                <div class="relative mb-3">
                    <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                        class="w-16 h-16 rounded-full border-2 border-green-300 shadow" alt="User Photo">
                </div>
                <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                <p class="text-xs text-green-200 mt-1">Administrator</p>
            </div>

            <!-- Navigation Links -->
            @php
                $navLinks = [
                    ['name' => 'Dashboard', 'icon' => 'fas fa-tachometer-alt', 'route' => 'admin.dashboard'],
                    ['name' => 'Kelola Profil', 'icon' => 'fas fa-user-circle', 'route' => 'admin.profil.index'],
                    ['name' => 'Kelola Kontak', 'icon' => 'fas fa-address-book', 'route' => 'admin.kontak.index'],
                    ['name' => 'Tentang Kami', 'icon' => 'fas fa-info-circle', 'route' => 'admin.tentang.index'],
                    ['name' => 'Infaq', 'icon' => 'fas fa-coins', 'route' => 'admin.infaq.index'],
                    ['name' => 'Post', 'icon' => 'fas fa-pencil', 'route' => 'admin.post.index'],
                    ['name' => 'Gallery', 'icon' => 'fas fa-image', 'route' => 'admin.gallery.index'],
                    ['name' => 'Organigram', 'icon' => 'fas fa-sitemap', 'route' => 'admin.organigram.edit'],
                    ['name' => 'Kegiatan', 'icon' => 'fas fa-calendar', 'route' => 'admin.kegiatan.index'],
                    ['name' => 'Program', 'icon' => 'fas fa-person-running', 'route' => 'admin.program.index'],
                    ['name' => 'Amalan Ramadhan', 'icon' => 'fas fa-mosque', 'route' => 'admin.amalans.index'],
                    ['name' => 'Settings', 'icon' => 'fas fa-gear', 'route' => 'admin.settings.edit'],
                ];
            @endphp

            <nav class="space-y-1">
                @foreach($navLinks as $link)
                    <a href="{{ route($link['route']) }}"
                       class="flex items-center gap-3 py-3 px-4 rounded-lg transition-colors duration-200 hover:bg-white/10 {{ request()->routeIs($link['route']) ? 'nav-link-active' : '' }}">
                        <i class="{{ $link['icon'] }} w-5"></i>
                        <span>{{ $link['name'] }}</span>
                    </a>
                @endforeach

                <form action="{{ route('logout') }}" method="POST" class="pt-4">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-3 py-3 px-4 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-medium transition-all duration-200 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 w-full">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-4 md:ml-64 bg-gray-50">
            <!-- Header -->
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">@yield('title', 'Dashboard')</h1>
                    <p class="text-sm text-gray-500">@yield('subtitle', 'Administrator Dashboard')</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">
                        <i class="fas fa-circle text-[6px] mr-1"></i> Online
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 h-auto w-full max-w-screen-xl mx-auto">
                @yield('content')
            </div>
        </main>

    <!-- Footer -->
    <footer class="bg-white border-t py-4 text-center text-sm text-gray-500">
        <div class="max-w-6xl mx-auto px-4">
            <p>© {{ date('Y') }} {{ $profil->nama}}. All rights reserved. version(2.2)</p>
        </div>
    </footer>
</div>

<!-- Sidebar toggle for mobile -->
<script>
    document.getElementById('sidebarToggle')?.addEventListener('click', () => {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('hidden');
    });
</script>
</body>
</html>
