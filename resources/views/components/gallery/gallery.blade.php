
<!-- Hero Header -->
<section class="relative bg-gradient-to-b from-green-600 to-green-700 py-24 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-500 rounded-full blur-[100px] opacity-20"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-400 rounded-full blur-[100px] opacity-20"></div>

    <div class="relative z-10 w-full mx-auto text-center">
        <div class="inline-flex items-center justify-center gap-4 mb-4">
            <div class="w-16 h-1 bg-white/50 rounded-full"></div>
            <span class="text-white/90 uppercase tracking-widest text-sm font-medium">Kenangan</span>
            <div class="w-16 h-1 bg-white/50 rounded-full"></div>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
            <span class="text-white/90">Galeri</span> Kegiatan
        </h1>
        <p class="text-white/80 max-w-2xl mx-auto">
            Dokumentasi berbagai kegiatan dan momen berharga di Masjid kami
        </p>
    </div>
</section>

<!-- Gallery Section -->
<section class="relative bg-white py-12 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full blur-[100px] opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-50 rounded-full blur-[100px] opacity-40"></div>

    <div class="relative z-10 w-full mx-auto">
        <!-- Gallery Content -->
        <div class="bg-white rounded-2xl shadow-xl border border-green-100/50 p-8">
            <!-- Filter Controls -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <select class="appearance-none bg-white border border-gray-200 rounded-lg pl-4 pr-10 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300">
                            <option>Semua Kategori</option>
                            <option>Sholat Jumat</option>
                            <option>Pengajian</option>
                            <option>Acara Hari Besar</option>
                            <option>Kegiatan Anak</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-green-600">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                </div>
                <div class="relative w-full md:w-64">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-green-600">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="text" class="pl-10 block w-full border border-gray-200 rounded-lg p-2.5 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300" placeholder="Cari foto...">
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Gallery Item 1 -->
                <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-green-100">
                    <img src="https://i.pinimg.com/736x/e9/39/1e/e9391ee1df13599fd0779e176363907c.jpg" alt="Kegiatan Masjid" class="w-full h-48 md:h-64 lg:h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <h3 class="text-white font-medium text-lg">Sholat Jumat</h3>
                        <p class="text-white/80 text-sm">12 Januari 2023</p>
                    </div>
                </div>

                <!-- Gallery Item 2 -->
                <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-green-100">
                    <img src="https://i.pinimg.com/736x/e9/39/1e/e9391ee1df13599fd0779e176363907c.jpg" alt="Kegiatan Masjid" class="w-full h-48 md:h-64 lg:h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <h3 class="text-white font-medium text-lg">Pengajian Rutin</h3>
                        <p class="text-white/80 text-sm">5 Februari 2023</p>
                    </div>
                </div>

                <!-- Gallery Item 3 -->
                <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-green-100">
                    <img src="https://i.pinimg.com/736x/e9/39/1e/e9391ee1df13599fd0779e176363907c.jpg" alt="Kegiatan Masjid" class="w-full h-48 md:h-64 lg:h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <h3 class="text-white font-medium text-lg">Buka Puasa Bersama</h3>
                        <p class="text-white/80 text-sm">15 April 2023</p>
                    </div>
                </div>

                <!-- Gallery Item 4 -->
                <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-green-100">
                    <img src="https://i.pinimg.com/736x/e9/39/1e/e9391ee1df13599fd0779e176363907c.jpg" alt="Kegiatan Masjid" class="w-full h-48 md:h-64 lg:h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <h3 class="text-white font-medium text-lg">Tadarus Al-Quran</h3>
                        <p class="text-white/80 text-sm">20 Mei 2023</p>
                    </div>
                </div>

                <!-- Gallery Item 5 -->
                <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-green-100">
                    <img src="https://i.pinimg.com/736x/e9/39/1e/e9391ee1df13599fd0779e176363907c.jpg" alt="Kegiatan Masjid" class="w-full h-48 md:h-64 lg:h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <h3 class="text-white font-medium text-lg">Penyaluran Zakat</h3>
                        <p class="text-white/80 text-sm">1 Juni 2023</p>
                    </div>
                </div>

                <!-- Gallery Item 6 -->
                <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-green-100">
                    <img src="https://i.pinimg.com/736x/e9/39/1e/e9391ee1df13599fd0779e176363907c.jpg" alt="Kegiatan Masjid" class="w-full h-48 md:h-64 lg:h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <h3 class="text-white font-medium text-lg">TPA Masjid</h3>
                        <p class="text-white/80 text-sm">10 Juli 2023</p>
                    </div>
                </div>

                <!-- Gallery Item 7 -->
                <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-green-100">
                    <img src="https://i.pinimg.com/736x/e9/39/1e/e9391ee1df13599fd0779e176363907c.jpg" alt="Kegiatan Masjid" class="w-full h-48 md:h-64 lg:h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <h3 class="text-white font-medium text-lg">Sholat Idul Fitri</h3>
                        <p class="text-white/80 text-sm">21 April 2023</p>
                    </div>
                </div>

                <!-- Gallery Item 8 -->
                <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-green-100">
                    <img src="https://i.pinimg.com/736x/e9/39/1e/e9391ee1df13599fd0779e176363907c.jpg" alt="Kegiatan Masjid" class="w-full h-48 md:h-64 lg:h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <h3 class="text-white font-medium text-lg">Akad Nikah</h3>
                        <p class="text-white/80 text-sm">15 Agustus 2023</p>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-10 flex justify-center">
                <nav class="inline-flex rounded-md shadow">
                    <a href="#" class="px-4 py-2 border border-green-200 rounded-l-lg bg-white text-green-600 hover:bg-green-50">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" class="px-4 py-2 border-t border-b border-green-200 bg-green-600 text-white">
                        1
                    </a>
                    <a href="#" class="px-4 py-2 border-t border-b border-green-200 bg-white text-green-600 hover:bg-green-50">
                        2
                    </a>
                    <a href="#" class="px-4 py-2 border-t border-b border-green-200 bg-white text-green-600 hover:bg-green-50">
                        3
                    </a>
                    <a href="#" class="px-4 py-2 border border-green-200 rounded-r-lg bg-white text-green-600 hover:bg-green-50">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</section>
