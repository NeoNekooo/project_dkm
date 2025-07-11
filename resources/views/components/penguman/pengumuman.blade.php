    <section class="bg-gradient-to-b from-green-50 to-white py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-green-800 relative inline-block">
                    Acara mendatang
                    <span class="absolute bottom-[-8px] left-1/2 transform -translate-x-1/2 w-16 h-1 bg-gradient-to-r from-green-500 to-teal-400 rounded-full"></span>
                </h2>
                <p class="text-lg text-green-600 mt-4 max-w-2xl mx-auto">Lihat pengumuman apa yang mendatang</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($kegiatanAktif as $kegiatan)
                <div class="group relative bg-white border border-green-100 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-1 h-full">
                    <!-- Date ribbon -->
                    <div class="absolute top-4 right-4 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full z-10">
                        {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M') }}
                    </div>

                    <div class="p-6 flex flex-col h-full">
                        <!-- Event details -->
                        <div class="flex items-center gap-3 text-green-600 mb-3">
                            <div class="p-2 bg-green-100 rounded-full">
                                <i class="fas fa-calendar-alt text-green-600"></i>
                            </div>
                            <span class="text-sm font-medium">
                                {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('l, F Y') }}
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-700 transition-colors">
                            {{ $kegiatan->judul }}
                        </h3>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            {{ $kegiatan->isi }}
                        </p>

                        <div class="flex items-center gap-3 text-sm text-gray-500 mt-auto">
                            <div class="p-2 bg-gray-100 rounded-full">
                                <i class="fas fa-map-marker-alt text-gray-600"></i>
                            </div>
                            <span>{{ $kegiatan->lokasi }}</span>
                        </div>
                    </div>
                </div>
            @endforeach

            </div>

            <!-- View all button -->
            <div class="mt-12 text-center">
                <a href="#" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-teal-500 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02]">
                    Lihat Semua Pengumuman
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>
