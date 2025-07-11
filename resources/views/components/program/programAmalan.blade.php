
<section class="relative py-16 px-4 sm:px-6 overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-10">
        <div class="absolute inset-0 "></div>
        <div class="absolute inset-0 bg-gradient-to-br from-white via-white/90 to-green-50/30"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center gap-4 mb-4">
                <div class="w-16 h-1 bg-gradient-to-r from-transparent to-green-400 rounded-full"></div>
                <span class="text-green-600 uppercase tracking-widest text-sm font-medium">Program Ramadhan 1446H</span>
                <div class="w-16 h-1 bg-gradient-to-l from-transparent to-green-400 rounded-full"></div>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3 relative inline-block">
                <span class="relative z-10">Amalan Masjid Al-Mubarokah</span>
                <span class="absolute -bottom-1 left-0 w-full h-2 bg-green-200/60 z-0"></span>
            </h2>
            <p class="text-lg text-gray-600 mt-2">di Bulan Suci Ramadhan</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-green-100/50 relative">
            <div class="absolute top-0 left-0 w-16 h-16 border-t-4 border-l-4 border-green-300 rounded-tl-2xl"></div>
            <div class="absolute top-0 right-0 w-16 h-16 border-t-4 border-r-4 border-green-300 rounded-tr-2xl"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 border-b-4 border-l-4 border-green-300 rounded-bl-2xl"></div>
            <div class="absolute bottom-0 right-0 w-16 h-16 border-b-4 border-r-4 border-green-300 rounded-br-2xl"></div>

     
            <div class="p-8 border-b border-green-100/30 relative">
                <div class="absolute -left-1 top-6 w-1 h-12 bg-green-400 rounded-full"></div>
                <h3 class="text-xl font-bold text-green-700 mb-6 pl-6 relative">
                    <span class="absolute left-0 top-1/2 -translate-y-1/2 w-4 h-4 bg-green-400 rounded-full"></span>
                    <span class="relative z-10">Amalan Harian</span>
                </h3>
                <ul class="space-y-4 text-gray-700 pl-6">
                    @forelse($amalans['Harian'] ?? [] as $amalan)
                        <li class="flex items-start relative">
                            <span class="absolute -left-4 top-3 w-2 h-2 bg-green-400 rounded-full"></span>
                            <span class="font-medium">{{ $amalan->nama_amalan }}</span>
                            @if($amalan->waktu)
                                <span class="text-sm text-gray-600 ml-1">({{ $amalan->waktu }})</span>
                            @endif
                            @if($amalan->deskripsi)
                                <span class="text-sm text-gray-600 ml-1">- {{ $amalan->deskripsi }}</span>
                            @endif
                        </li>
                    @empty
                        <li class="text-gray-500">Tidak ada amalan harian yang terdaftar.</li>
                    @endforelse
                </ul>
            </div>

      
            <div class="p-8 border-b border-green-100/30 relative">
                <div class="absolute -left-1 top-6 w-1 h-12 bg-green-400 rounded-full"></div>
                <h3 class="text-xl font-bold text-green-700 mb-6 pl-6 relative">
                    <span class="absolute left-0 top-1/2 -translate-y-1/2 w-4 h-4 bg-green-400 rounded-full"></span>
                    <span class="relative z-10">Amalan Mingguan</span>
                </h3>
                <ul class="space-y-4 text-gray-700 pl-6">
                    @forelse($amalans['Mingguan'] ?? [] as $amalan)
                        <li class="flex items-start relative">
                            <span class="absolute -left-4 top-3 w-2 h-2 bg-green-400 rounded-full"></span>
                            <span class="font-medium">{{ $amalan->nama_amalan }}</span>
                            @if($amalan->waktu)
                                <span class="text-sm text-gray-600 ml-1">({{ $amalan->waktu }})</span>
                            @endif
                            @if($amalan->deskripsi)
                                <span class="text-sm text-gray-600 ml-1">- {{ $amalan->deskripsi }}</span>
                            @endif
                        </li>
                    @empty
                        <li class="text-gray-500">Tidak ada amalan mingguan yang terdaftar.</li>
                    @endforelse
                </ul>
            </div>

         
            <div class="p-8 relative">
                <div class="absolute -left-1 top-6 w-1 h-12 bg-green-400 rounded-full"></div>
                <h3 class="text-xl font-bold text-green-700 mb-6 pl-6 relative">
                    <span class="absolute left-0 top-1/2 -translate-y-1/2 w-4 h-4 bg-green-400 rounded-full"></span>
                    <span class="relative z-10">Amalan Khusus</span>
                </h3>
                <ul class="space-y-4 text-gray-700 pl-6">
                    @forelse($amalans['Khusus'] ?? [] as $amalan)
                        <li class="flex items-start relative">
                            <span class="absolute -left-4 top-3 w-2 h-2 bg-green-400 rounded-full"></span>
                            <span class="font-medium">{{ $amalan->nama_amalan }}</span>
                            @if($amalan->waktu)
                                <span class="text-sm text-gray-600 ml-1">({{ $amalan->waktu }})</span>
                            @endif
                            @if($amalan->deskripsi)
                                <span class="text-sm text-gray-600 ml-1">- {{ $amalan->deskripsi }}</span>
                            @endif
                        </li>
                    @empty
                        <li class="text-gray-500">Tidak ada amalan khusus yang terdaftar.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="mt-12 text-center">
            <div class="inline-block px-6 py-1 bg-green-50 text-green-600 rounded-full text-sm font-medium">
                Semoga Allah menerima semua amal ibadah kita
            </div>
        </div>
    </div>
</section>
