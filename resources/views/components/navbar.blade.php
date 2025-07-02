<nav class="bg-white shadow-md py-4 px-4 md:px-8 flex justify-between items-center">
    <div class="flex items-center">
        <img src="{{ asset('img/image.png') }}" alt="Logo DKM" class="h-12 mr-3 rounded-full shadow-md">
        <span class="text-xl font-bold text-gray-800">DKM</span>
    </div>
    <div class="hidden md:flex space-x-6 text-gray-700 font-semibold">
        <a href="/" class="hover:text-green-600">Beranda</a>
        <a href="{{route('tentang')}}" class="hover:text-green-600">Tentang Kami</a>
        <a href="{{route('program')}}" class="hover:text-green-600">Program</a>
        <a href="#" class="hover:text-green-600">Infaq Masjid</a>
        <a href="#" class="hover:text-green-600">Events Masjid</a>
        <a href="#" class="hover:text-green-600">Berita Masjid</a>
        <a href="#" class="hover:text-green-600">Kontak</a>
    </div>
    <button class="md:hidden text-gray-700 focus:outline-none">
        <i class="fas fa-bars text-xl"></i>
    </button>
</nav>
