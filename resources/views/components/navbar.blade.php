<nav class="bg-white shadow-md py-2 px-4 md:px-8 sticky top-0 z-50">
    <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
            <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo DKM"
                class="h-8 mr-3 rounded-full shadow-md border-2 border-green-100">
            <span class="text-lg font-bold text-gray-800">
                DKM <span class="text-green-600">{{ $profil->nama }}</span>
            </span>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex space-x-6 items-center font-medium text-gray-700">
            <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>
            <x-nav-link href="{{ route('tentang') }}" :active="Route::is('tentang')">Tentang Kami</x-nav-link>
            <x-nav-link href="{{ route('program') }}" :active="Route::is('program')">Program</x-nav-link>
            <x-nav-link href="{{ route('infaq') }}" :active="Route::is('infaq')">Infaq</x-nav-link>
            <x-nav-link href="{{ route('gallery') }}" :active="Route::is('gallery')">Gallery</x-nav-link>

            <!-- Dropdown Informasi -->
            <div class="relative group">
                <button class="flex items-center gap-1 focus:outline-none transition-colors duration-200
                    {{ Route::is('blog*') || Route::is('pengumuman') ? 'text-green-600 font-semibold' : 'hover:text-green-600' }}">
                    Informasi
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div
                    class="absolute left-0 mt-2 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-200
                           w-48 bg-white rounded-lg shadow-lg border border-green-100 z-50 py-2">
                    <x-dropdown-link href="{{ route('blog') }}" :active="Route::is('blog*')">Berita</x-dropdown-link>
                    <x-dropdown-link href="{{ route('pengumuman') }}" :active="Route::is('pengumuman')">Pengumuman</x-dropdown-link>
                </div>
            </div>

            <x-nav-link href="{{ route('kontak') }}" :active="Route::is('kontak')">Kontak</x-nav-link>

            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="bg-green-100 hover:bg-green-200 text-green-800 px-3 py-1 rounded text-sm font-semibold shadow-sm transition">
                        Admin Dashboard
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline text-sm">Logout</button>
                    </form>
                @endif
            @endauth
        </div>

        <!-- Mobile Hamburger -->
        <button id="mobile-menu-button" class="md:hidden text-gray-700 focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>

    <!-- Mobile Menu (hidden by default, toggle with JS) -->
    <div id="mobile-menu" class="hidden md:hidden mt-4 flex flex-col space-y-2 font-medium text-gray-700">
        <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>
        <x-nav-link href="{{ route('tentang') }}" :active="Route::is('tentang')">Tentang Kami</x-nav-link>
        <x-nav-link href="{{ route('program') }}" :active="Route::is('program')">Program</x-nav-link>
        <x-nav-link href="{{ route('infaq') }}" :active="Route::is('infaq')">Infaq</x-nav-link>
        <x-nav-link href="{{ route('gallery') }}" :active="Route::is('gallery')">Gallery</x-nav-link>
        <x-nav-link href="{{ route('blog') }}" :active="Route::is('blog*')">Berita</x-nav-link>
        <x-nav-link href="{{ route('pengumuman') }}" :active="Route::is('pengumuman')">Pengumuman</x-nav-link>
        <x-nav-link href="{{ route('kontak') }}" :active="Route::is('kontak')">Kontak</x-nav-link>
        @auth
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="text-green-600">Admin Dashboard</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-500">Logout</button>
                </form>
            @endif
        @endauth
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', () => {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
