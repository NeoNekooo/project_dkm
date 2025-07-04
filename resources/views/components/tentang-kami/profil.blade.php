<section class="relative  bg-gradient-to-r from-green-800 to-emerald-900  text-white py-24 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-yellow-400/10 rounded-full blur-3xl z-0"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl z-0"></div>
    <div class="absolute inset-0 z-0 opacity-10 bg-[url('https://i.pinimg.com/736x/3e/3f/4f/3e3f4f19b77e2cd505cf4d1d7b30f3e2.jpg')] bg-cover mix-blend-soft-light"></div>

    <div class="relative z-10 max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 items-center gap-16">
        <!-- Content -->
        <div class="space-y-6">
            <div class="inline-flex items-center gap-3">
                <div class="w-12 h-1 bg-yellow-500 rounded-full"></div>
                <span class="text-yellow-500 uppercase tracking-widest text-sm font-medium">Ketua DKM</span>
            </div>

            <h2 class="text-3xl md:text-4xl font-bold leading-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-yellow-200">{{ $profil->tentangKami->nama_ketua }}</span>
            </h2>

            <div class="space-y-4 text-gray-300 leading-relaxed">
                @foreach (explode("\n", $profil->tentangKami->sejarah_ketua ?? '') as $paragraph)
                    @if (trim($paragraph) != '')
                        <p>{{ $paragraph }}</p>
                    @endif
                @endforeach
            </div>

            <div class="pt-2">
                <a href="#" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-yellow-500 to-yellow-400 text-[#0B1A40] font-bold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 group">
                    Lihat Program DKM
                    <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>

        <!-- Portrait -->
        <div class="flex justify-center relative group">
            <div class="relative overflow-hidden rounded-xl shadow-2xl w-full max-w-md">
                <!-- Decorative frame elements -->
                <div class="absolute inset-0 border-2 border-yellow-400/30 rounded-xl transform rotate-1 group-hover:rotate-0 transition-transform duration-500"></div>
                <div class="absolute inset-0 border-2 border-white/10 rounded-xl transform -rotate-1 group-hover:rotate-0 transition-transform duration-700"></div>

                <!-- Portrait image with gradient overlay -->
                <div class="relative aspect-[3/4] overflow-hidden">
                    <img src="{{ asset('storage/' . $profil->tentangKami->foto_ketua) }}"
                        alt="Ketua DKM"
                        class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                </div>

                <!-- Title overlay -->
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                    <h3 class="text-xl font-bold text-white">{{ $profil->tentangKami->nama_ketua}}</h3>
                    <p class="text-yellow-400 text-sm">Ketua DKM {{ $profil->nama }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
