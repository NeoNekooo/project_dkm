<!-- QR Donation Section -->
<section class="relative bg-white py-24 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full blur-[100px] opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-50 rounded-full blur-[100px] opacity-40"></div>

    <div class="relative z-10 max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        <!-- QR Image -->
        <div class="flex justify-center group">
            <div class="relative overflow-hidden rounded-xl shadow-xl border-2 border-green-200 w-full max-w-md">
                @if($infaq->picture)
                    <img src="{{ asset('storage/' . $infaq->picture) }}" alt="QR Code Donasi"
                         class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105">
                @else
                    <img src="{{ asset('img/miaw.png') }}" alt="QR Code Donasi"
                         class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105">
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-green-900/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
        </div>

        <!-- Content -->
        <div class="space-y-6">
            <div class="inline-flex items-center gap-3 mb-4">
                <div class="w-12 h-1 bg-green-600 rounded-full"></div>
                <span class="text-green-600 uppercase tracking-widest text-sm font-medium">Donasi Digital</span>
            </div>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                {{ $infaq->headline ?? 'Infaq Masjid Melalui QRIS' }}
            </h2>

            <div class="space-y-4 text-gray-600">
                <p>
                    {{ $infaq->description ?? 'Masjid ini menyediakan fasilitas Infaq bagi Jama\'ah Masjid dengan menggunakan QR Scan Barcode, disamping fasilitas kotak infaq yang sudah tersedia terlebih dahulu.' }}
                </p>

                @if($infaq->nomer_rekening || $infaq->nama_rekening)
                <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                    <p class="font-medium text-green-700">Informasi Rekening:</p>
                    @if($infaq->nomer_rekening)
                    <p>No. Rekening: {{ $infaq->nomer_rekening }}</p>
                    @endif
                    @if($infaq->nama_rekening)
                    <p>Atas Nama: {{ $infaq->nama_rekening }}</p>
                    @endif
                </div>
                @endif
            </div>

            <div class="pt-4">
                <a href="#" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                    <i class="fas fa-qrcode mr-2"></i>
                    Scan QR Sekarang
                </a>
            </div>
        </div>
    </div>
</section>
