<section class="relative bg-white py-16 px-6 overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full blur-[100px] opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-50 rounded-full blur-[100px] opacity-40"></div>

    <div class="relative z-10 max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-3 mb-4">
                <div class="w-12 h-1 bg-green-600 rounded-full"></div>
                <span class="text-green-600 uppercase tracking-widest text-sm font-medium">Perjalanan Pembangunan</span>
                <div class="w-12 h-1 bg-green-600 rounded-full"></div>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Sejarah Pembangunan Masjid Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Ikuti perjalanan spiritual dan fisik dalam pembangunan rumah Allah ini, dari ide awal hingga menjadi pusat ibadah yang megah.
            </p>
        </div>

        <div class="relative space-y-12">
            @foreach($pembangunans->sortBy('urutan') as $item)
                <div class="w-full flex flex-col md:flex-row items-center {{ $loop->iteration % 2 == 0 ? 'md:flex-row-reverse' : '' }}">
                    <div class="md:w-1/2 md:px-12 mb-6 md:mb-0">
                        <div class="bg-green-600 text-white rounded-xl p-6 shadow-lg">
                            <h3 class="text-xl font-bold mb-2">{{ $item->judul }}</h3>
                            <p class="text-white/90 mb-3">{{ $item->tanggal }}</p>
                            <p class="text-white/80">{{ $item->deskripsi }}</p>
                        </div>
                    </div>
                    <div class="md:w-1/2 md:px-12">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="rounded-xl shadow-md w-full h-auto">
                        @else
                            <div class="bg-gray-200 rounded-xl w-full h-48 flex items-center justify-center text-gray-500">
                                Tidak ada gambar
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-green-50 rounded-xl p-6 text-center border border-green-100">
                <div class="text-4xl font-bold text-green-600 mb-2">{{ $pembangunans->count() }}</div>
                <div class="text-gray-700">Tahap Pembangunan</div>
            </div>
            <div class="bg-green-50 rounded-xl p-6 text-center border border-green-100">
                <div class="text-4xl font-bold text-green-600 mb-2">18</div>
                <div class="text-gray-700">Bulan Pengerjaan</div>
            </div>
            <div class="bg-green-50 rounded-xl p-6 text-center border border-green-100">
                <div class="text-4xl font-bold text-green-600 mb-2">120+</div>
                <div class="text-gray-700">Relawan Terlibat</div>
            </div>
            <div class="bg-green-50 rounded-xl p-6 text-center border border-green-100">
                <div class="text-4xl font-bold text-green-600 mb-2">5000+</div>
                <div class="text-gray-700">Donatur Berpartisipasi</div>
            </div>
        </div>
    </div>
</section>
