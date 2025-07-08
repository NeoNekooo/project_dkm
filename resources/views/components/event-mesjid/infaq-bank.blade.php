
<!-- Section 2: Bank Transfer -->
<section id="BankTransfer" class="relative bg-white py-24 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-green-100 rounded-full blur-[100px] opacity-40"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-green-50 rounded-full blur-[100px] opacity-40"></div>

    <div class="relative z-10 max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        <!-- Content -->
        <div class="order-2 md:order-1">
            <div class="inline-flex items-center gap-3 mb-4">
                <div class="w-12 h-1 bg-green-600 rounded-full"></div>
                <span class="text-green-600 uppercase tracking-widest text-sm font-medium">Transfer Bank</span>
            </div>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">
                Tunaikan <span class="text-green-600">Infaq</span> Terbaik Anda
            </h2>

            <div class="bg-green-50/50 border border-green-100 rounded-xl p-6 mb-6">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-green-100 rounded-lg text-green-600">
                        <i class="fas fa-university text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-green-600">Nomor Rekening</p>
                        <p class="text-2xl font-bold text-gray-800 font-mono">0123 4141 2414 1</p>
                    </div>
                </div>
            </div>

            <div class="bg-green-50/50 border border-green-100 rounded-xl p-6">
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-green-100 rounded-lg text-green-600">
                        <i class="fas fa-landmark text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-green-600">Atas Nama</p>
                        <p class="text-2xl font-bold text-gray-800">Masjid Al-Ikhlash</p>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <a href="#" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Konfirmasi Transfer
                </a>
            </div>
        </div>

        <!-- Bank Image -->
        <div class="order-1 md:order-2 flex justify-center group">
            <div class="relative overflow-hidden rounded-xl shadow-xl border-2 border-green-200 w-full max-w-md">
                <img src="{{ asset('img/miaw.png') }}" alt="Bank Transfer"
                     class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-green-900/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
        </div>
    </div>
</section>
