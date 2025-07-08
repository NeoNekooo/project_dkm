<section class="relative bg-white py-12 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full blur-[100px] opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-50 rounded-full blur-[100px] opacity-40"></div>

    <div class="relative z-10 w-full mx-auto">
        <div class="bg-white rounded-2xl shadow-xl border border-green-100/50 p-8">

            <!-- Filter Controls -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <!-- Tab / Kategori -->
                <div class="flex flex-wrap gap-2">
                    <button class="px-4 py-2 rounded-full text-sm font-medium border bg-green-600 text-white">
                        Semua
                    </button>
                    <!-- Kategori lainnya bisa kamu isi manual -->
                    <button class="px-4 py-2 rounded-full text-sm font-medium border bg-white text-green-700 border-green-300">
                        Sholat Jumat
                    </button>
                    <button class="px-4 py-2 rounded-full text-sm font-medium border bg-white text-green-700 border-green-300">
                        Pengajian
                    </button>
                    <!-- dst -->
                </div>

                <!-- Search -->
                <div class="relative w-full md:w-64">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-green-600">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="text"
                        class="pl-10 block w-full border border-gray-200 rounded-lg p-2.5 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                        placeholder="Cari foto..." disabled>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($imgs as $img)
                    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-green-100">
                        <img src="{{ asset('storage/' . $img->path) }}" alt="{{ $img->name }}"
                            class="w-full h-48 md:h-64 lg:h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h3 class="text-white font-medium text-lg">{{ $img->name }}</h3>
                            <p class="text-white/80 text-sm">{{ \Carbon\Carbon::parse($img->tanggal)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
