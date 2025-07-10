<nav class="bg-white shadow-md py-4 px-4 md:px-8 flex justify-between items-center sticky top-0 z-50">
    <div class="flex items-center">
        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo DKM"
            class="h-12 mr-3 rounded-full shadow-md border-2 border-green-100">
        <span class="text-xl font-bold text-gray-800">DKM <span class="text-green-600">{{ $profil->nama }}</span></span>
    </div>

    <div class="hidden md:flex space-x-6 text-gray-700 font-medium items-center">
        <a href="/" class="{{ request()->is('/') ? 'text-green-600 font-semibold' : 'hover:text-green-600' }} transition-colors duration-200">Beranda</a>

        <a href="{{ route('tentang') }}" class="{{ Route::is('tentang') ? 'text-green-600 font-semibold' : 'hover:text-green-600' }} transition-colors duration-200">Tentang Kami</a>

        <a href="{{ route('program') }}" class="{{ Route::is('program') ? 'text-green-600 font-semibold' : 'hover:text-green-600' }} transition-colors duration-200">Program</a>

        <a href="{{ route('infaq') }}" class="{{ Route::is('infaq') ? 'text-green-600 font-semibold' : 'hover:text-green-600' }} transition-colors duration-200">Infaq</a>

        <a href="{{ route('gallery') }}" class="{{ Route::is('gallery') ? 'text-green-600 font-semibold' : 'hover:text-green-600' }} transition-colors duration-200">Gallery</a>

        <div class="relative group">
            <button class="flex items-center gap-1 transition-colors duration-200 {{ Route::is('blog*') || Route::is('pengumuman') ? 'text-green-600 font-semibold' : 'hover:text-green-600' }}">
                Informasi
                <i class="fas fa-chevron-down text-xs transition-transform duration-200 group-hover:rotate-180"></i>
            </button>

            <div
                class="absolute z-10 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-200
                        flex flex-col bg-white shadow-lg rounded-lg py-2 w-48 mt-2 border border-green-100">
                <a href="{{ route('blog') }}"
                    class="px-4 py-2 transition-colors duration-200 {{ Route::is('blog*') ? 'text-green-600 font-semibold bg-green-50' : 'hover:bg-green-50 hover:text-green-700' }}">
                    <i class="fas fa-newspaper mr-2 text-green-600"></i> Berita
                </a>
                <a href="{{ route('pengumuman') }}"
                    class="px-4 py-2 transition-colors duration-200 {{ Route::is('pengumuman') ? 'text-green-600 font-semibold bg-green-50' : 'hover:bg-green-50 hover:text-green-700' }}">
                    <i class="fas fa-bullhorn mr-2 text-green-600"></i> Pengumuman
                </a>
            </div>
        </div>

        <a href="{{ route('kontak') }}" class="{{ Route::is('kontak') ? 'text-green-600 font-semibold' : 'hover:text-green-600' }} transition-colors duration-200">Kontak</a>

        @auth
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-accent mr-2">
                    Admin Dashboard
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-500 hover:underline">Logout</button>
                </form>

            @endif
        @endauth
    </div>

    <!-- Mobile Hamburger -->
    <button class="md:hidden text-gray-700 focus:outline-none">
        <i class="fas fa-bars text-xl"></i>
    </button>
</nav>
