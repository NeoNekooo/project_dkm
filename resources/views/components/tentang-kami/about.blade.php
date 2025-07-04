<section class="relative bg-gradient-to-b from-white to-green-50 py-24 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full blur-[100px] opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-50 rounded-full blur-[100px] opacity-40"></div>

    <!-- Subtle Islamic pattern -->
    <div
        class="absolute inset-0 opacity-5 bg-[url('https://i.pinimg.com/736x/3e/3f/4f/3e3f4f19b77e2cd505cf4d1d7b30f3e2.jpg')] bg-cover mix-blend-overlay">
    </div>

    <div class="relative z-10 max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 items-center gap-12">
        <!-- Image with decorative frame -->
        <div class="group relative">
            <div
                class="absolute -inset-4 border-2 border-green-300 rounded-lg transform rotate-1 group-hover:rotate-0 transition-transform duration-500">
            </div>
            @if ($profil->tentangKami && $profil->tentangKami->foto_masjid)
                <img src="{{ asset('storage/' . $profil->tentangKami->foto_masjid) }}" alt="Foto Masjid"
                    class="relative z-10 rounded-lg shadow-xl transform group-hover:scale-[1.02] transition-all duration-500 w-full h-auto">
            @else
                <p>Belum ada foto masjid yang diunggah.</p>
            @endif

        </div>

        <!-- Content -->
        <div class="space-y-6">
            <div class="inline-flex items-center gap-3">
                <div class="w-12 h-1 bg-green-600 rounded-full"></div>
                <span class="text-green-600 uppercase tracking-widest text-sm font-medium">Tentang Kami</span>
            </div>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight">
                Sejarah Singkat<br>
                <span class="text-green-600">{{ $profil->nama }}</span>
            </h2>

            <div class="space-y-4 text-gray-600 leading-relaxed">
                @foreach (explode("\n", $profil->tentangKami->isi ?? '') as $paragraph)
                    @if (trim($paragraph) != '')
                        <p>{{ $paragraph }}</p>
                    @endif
                @endforeach
            </div>

            <div class="grid grid-cols-2 gap-4 pt-4">
                <div class="bg-white p-4 rounded-lg border border-green-100 shadow-sm">
                    <p class="text-green-600 text-sm font-medium">Luas Tanah</p>
                    <p class="text-xl font-bold text-gray-800">{{ $profil->luas_tanah }}</p>
                </div>
                <div class="bg-white p-4 rounded-lg border border-green-100 shadow-sm">
                    <p class="text-green-600 text-sm font-medium">Tahun Berdiri</p>
                    <p class="text-xl font-bold text-gray-800">{{ $profil->tahun_berdiri }}</p>
                </div>
            </div>

            {{-- <div class="pt-6">
                <a href="#" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                    Baca Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div> --}}
        </div>
    </div>
</section>
