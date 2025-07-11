<section class="relative bg-white py-24 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-green-100/50 rounded-full blur-3xl z-0"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-green-50 rounded-full blur-3xl z-0"></div>

    <div class="relative z-10 max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        <!-- Image with hover effect -->
        <div class="group relative overflow-hidden rounded-2xl shadow-xl">
            <img src="{{ asset('storage/' . $profil->tentangKami->foto_masjid) }}" alt="Tentang Masjid"
                class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105">
            <div
                class="absolute inset-0 bg-gradient-to-t from-green-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            </div>
        </div>

        <!-- Content -->
        <div class="space-y-6">
            <div class="inline-flex items-center gap-3 mb-2">
                <div class="w-12 h-1 bg-green-600 rounded-full"></div>
                <span class="text-sm font-medium text-green-600">Tentang Kami</span>
            </div>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight">
                Masjid {{ $profil->nama }}
            </h2>

            <div class="space-y-4 text-gray-600">
                @foreach (explode("\n", $profil->tentangKami->isi ?? '') as $paragraph)
                    @if (trim($paragraph) != '')
                        <p>{{ $paragraph }}</p>
                    @endif
                @endforeach
            </div>

            <div class="flex flex-wrap gap-4 pt-2">
                <a href="{{ route('program') }}"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-green-500 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02]">
                    Lihat Program Kami
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <a href="{{ route('kontak') }}"
                    class="inline-flex items-center px-6 py-3 text-green-600 font-semibold border-2 border-green-600 rounded-lg hover:bg-green-50 transition-colors duration-300">
                    Kontak Kami
                </a>
            </div>
        </div>
    </div>
</section>
