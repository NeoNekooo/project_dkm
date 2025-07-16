<section class="relative h-screen flex items-center justify-center bg-no-repeat bg-cover bg-center overflow-hidden"
    style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.3)), url('{{ asset('storage/' . $profil->background) }}');">
    <!-- Decorative elements -->
    {{-- <div class="absolute top-0 left-0 w-64 h-64 bg-green-400 rounded-full blur-[100px] opacity-60"></div> --}}
    {{-- <div class="absolute bottom-0 right-0 w-80 h-80 bg-green-50 rounded-full blur-[100px] opacity-60"></div> --}}

    <!-- Subtle Islamic pattern -->
    <!-- Content container -->
    <div class="relative z-10 text-center max-w-4xl mx-auto px-6 py-12">
        <!-- Islamic greeting with decorative elements -->
        <div class="mb-10">
            <div class="flex justify-center items-center gap-4 mb-6">
                <div class="w-16 h-1 bg-green-600 rounded-full"></div>
                <span class="text-green-600 font-medium">السَّلَامُ عَلَيْكُمْ</span>
                <div class="w-16 h-1 bg-green-600 rounded-full"></div>
            </div>

            <h1 class="text-4xl md:text-5xl font-bold text-gray-200 mb-6">
                Selamat Datang <br> di <span class="text-green-600">{{ $profil->nama }}</span>
            </h1>

            <p class="text-lg md:text-xl text-white max-w-2xl mx-auto leading-relaxed">
                Tempat ibadah yang membawa kedamaian dan keberkahan bagi seluruh umat.
            </p>
        </div>

        <!-- Action buttons -->
        <div class="flex flex-col md:flex-row justify-center items-center gap-4 mb-16">
            <a href="{{route('tentang')}}" class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-full shadow-md hover:shadow-lg transition-all duration-300 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Info Selengkapnya
            </a>

            <a href="{{route('infaq')}}" class="px-8 py-3 bg-white hover:bg-gray-50 text-green-600 font-semibold border-2 border-green-600 rounded-full shadow-md hover:shadow-lg transition-all duration-300 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Infaq Ke Masjid
            </a>
        </div>

        <!-- Additional info -->
        <div class="max-w-3xl mx-auto px-6 py-4 bg-white/50 backdrop-blur-sm rounded-xl border border-green-100 shadow-sm">
            <p class="text-sm md:text-base text-gray-600">
                "Masjid kami hadir sebagai pusat ibadah dan kegiatan umat Islam, membangun generasi yang berakhlak mulia dan bertaqwa."
            </p>
        </div>

        <!-- Scroll indicator -->

    </div>
</section>
