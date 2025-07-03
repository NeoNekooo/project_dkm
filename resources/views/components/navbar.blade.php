<!-- Navigation -->
<nav class="bg-white shadow-md py-4 px-4 md:px-8 flex justify-between items-center sticky top-0 z-50">
    <div class="flex items-center">
        <img src="{{ asset('img/image.png') }}" alt="Logo DKM" class="h-12 mr-3 rounded-full shadow-md border-2 border-green-100">
        <span class="text-xl font-bold text-gray-800">DKM <span class="text-green-600">Al-Ikhlash</span></span>
    </div>

    <!-- Navigation Links -->
    <div class="hidden md:flex space-x-6 text-gray-700 font-medium items-center">
        <a href="/" class="hover:text-green-600 transition-colors duration-200">Beranda</a>
        <a href="{{ route('tentang') }}" class="hover:text-green-600 transition-colors duration-200">Tentang Kami</a>
        <a href="{{ route('program') }}" class="hover:text-green-600 transition-colors duration-200">Program</a>
        <a href="{{ route('infaq') }}" class="hover:text-green-600 transition-colors duration-200">Infaq</a>
        <a href="{{ route('event-mesjid') }}" class="hover:text-green-600 transition-colors duration-200">Kegiatan</a>

        <div class="relative group">
            <!-- Trigger Button -->
            <button class="hover:text-green-600 flex items-center gap-1 transition-colors duration-200">
                Informasi
                <i class="fas fa-chevron-down text-xs transition-transform duration-200 group-hover:rotate-180"></i>
            </button>

            <!-- Dropdown Menu -->
            <div class="absolute z-10 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-200
                        flex flex-col bg-white shadow-lg rounded-lg py-2 w-48 mt-2 border border-green-100">
                <a href="{{ route('blog') }}" class="px-4 py-2 hover:bg-green-50 hover:text-green-700 transition-colors duration-200">
                    <i class="fas fa-newspaper mr-2 text-green-600"></i> Berita
                </a>
                <a href="{{ route('pengumuman') }}" class="px-4 py-2 hover:bg-green-50 hover:text-green-700 transition-colors duration-200">
                    <i class="fas fa-bullhorn mr-2 text-green-600"></i> Pengumuman
                </a>
            </div>
        </div>

        <a href="{{ route('kontak') }}" class="hover:text-green-600 transition-colors duration-200">Kontak</a>
    </div>

    <!-- Mobile Hamburger -->
    <button class="md:hidden text-gray-700 focus:outline-none">
        <i class="fas fa-bars text-xl"></i>
    </button>
</nav>
