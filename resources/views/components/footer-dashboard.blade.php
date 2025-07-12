<footer class="bg-gradient-to-b from-green-800 to-green-900 text-white pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-10">
        <!-- About Section -->
        <div class="space-y-4">
            <div class="flex items-center">
                <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Masjid" class="h-10 mr-3 rounded-full border-2 border-green-100">
                <span class="text-xl font-bold">{{ $profil->nama }}</span>
            </div>
            <div class="flex space-x-4 pt-2">
                <a href="{{ $profil->fb }}"
                    class="text-green-200 hover:text-white transition-colors duration-200"
                    target="_blank">
                    <i class="fab fa-facebook-f"></i>
                 </a>

                 <a href="{{ $profil->ig }}"
                    class="text-green-200 hover:text-white transition-colors duration-200"
                    target="_blank">
                    <i class="fab fa-instagram"></i>
                 </a>

                 <a href="{{ $profil->yt }}"
                    class="text-green-200 hover:text-white transition-colors duration-200"
                    target="_blank">
                    <i class="fab fa-youtube"></i>
                 </a>

                 <a href="{{ $profil->wa }}"
                    class="text-green-200 hover:text-white transition-colors duration-200"
                    target="_blank">
                    <i class="fab fa-whatsapp"></i>
                 </a>
            </div>
        </div>

        <!-- Quick Links -->
        <div>
            <h4 class="font-bold text-lg mb-4 flex items-center">
                <i class="fas fa-link text-green-300 mr-2"></i> Tautan Cepat
            </h4>
            <ul class="space-y-3 text-sm text-green-100">
                <li><a href="/" class="hover:text-white flex items-center"><i class="fas fa-chevron-right text-xs text-green-300 mr-2"></i> Beranda</a></li>
                <li><a href="{{ route('tentang') }}" class="hover:text-white flex items-center"><i class="fas fa-chevron-right text-xs text-green-300 mr-2"></i> Tentang Kami</a></li>
                <li><a href="{{ route('program') }}" class="hover:text-white flex items-center"><i class="fas fa-chevron-right text-xs text-green-300 mr-2"></i> Program</a></li>
                <li><a href="{{ route('infaq') }}" class="hover:text-white flex items-center"><i class="fas fa-chevron-right text-xs text-green-300 mr-2"></i> Infaq</a></li>
                <li><a href="{{ route('kontak') }}" class="hover:text-white flex items-center"><i class="fas fa-chevron-right text-xs text-green-300 mr-2"></i> Kontak</a></li>
            </ul>
        </div>

        <!-- Programs -->
        <div>
            <h4 class="font-bold text-lg mb-4 flex items-center">
                <i class="fas fa-calendar-check text-green-300 mr-2"></i> Program
            </h4>
            <ul class="space-y-3 text-sm text-green-100">
                <li><a href="{{ route('program') }}#program" class="hover:text-white flex items-center"><i class="fas fa-chevron-right text-xs text-green-300 mr-2"></i> Program Kami</a></li>
                <li><a href="{{ route('program') }}#Amalan" class="hover:text-white flex items-center"><i class="fas fa-chevron-right text-xs text-green-300 mr-2"></i> Amalan Harian</a></li>
            </ul>
        </div>

        <!-- Contact Info -->
        <div>
            <h4 class="font-bold text-lg mb-4 flex items-center">
                <i class="fas fa-map-marker-alt text-green-300 mr-2"></i> Kontak
            </h4>
            <ul class="space-y-3 text-sm text-green-100">
                <li class="flex items-start">
                    <i class="fas fa-phone-alt text-green-300 mr-3 mt-1"></i>
                    <div>
                        <p>{{ $profil->kontak->nomer1 ?? '-' }}</p>
                        <p>{{ $profil->kontak->nomer2 }}</p>
                    </div>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-envelope text-green-300 mr-3 mt-1"></i>
                    <p>{{ $profil->kontak->email ?? '-' }}</p>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-map-marker-alt text-green-300 mr-3 mt-1"></i>
                    <p>{!! nl2br(e($profil->kontak->alamat ?? '-')) !!}</p>
                </li>
            </ul>
        </div>
    </div>

    <div class="border-t border-green-700 mt-12 pt-6 text-center text-sm text-green-200">
        <p>© {{ now()->year }} {{ $profil->nama }}. All rights reserved.</p>
    </div>
</footer>
