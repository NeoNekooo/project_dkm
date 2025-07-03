@php
    $programs = [
        [
            'title' => 'Pembangunan',
            'desc' => 'Renovasi dan pembangunan fasilitas ibadah secara berkelanjutan.',
            'icon' => 'fa-building',
            'color' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
        ],
        [
            'title' => 'Dakwah',
            'desc' => 'Kajian rutin, ceramah, dan kegiatan syiar Islam.',
            'icon' => 'fa-mosque',
            'color' => 'bg-green-100 text-green-700 border-green-200',
        ],
        [
            'title' => 'Sosial',
            'desc' => 'Santunan anak yatim, bantuan sembako, dan bakti masyarakat.',
            'icon' => 'fa-hands-helping',
            'color' => 'bg-blue-100 text-blue-700 border-blue-200',
        ],
        [
            'title' => 'ZIS',
            'desc' => 'Pengelolaan Zakat, Infaq, dan Shodaqoh secara transparan.',
            'icon' => 'fa-coins',
            'color' => 'bg-purple-100 text-purple-700 border-purple-200',
        ],
    ];
@endphp

<!-- Programs Grid Section -->
<section class="relative bg-gradient-to-b from-white to-green-50 py-24 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full blur-[100px] opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-50 rounded-full blur-[100px] opacity-40"></div>

    <div class="relative z-10 max-w-6xl mx-auto">
        <!-- Section header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-4 mb-4">
                <div class="w-12 h-1 bg-green-600 rounded-full"></div>
                <span class="text-green-600 font-medium uppercase tracking-wider">Program Unggulan</span>
                <div class="w-12 h-1 bg-green-600 rounded-full"></div>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Kegiatan Masjid Al-Ikhlash
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Berbagai program untuk memakmurkan masjid dan membina umat
            </p>
        </div>

        <!-- Programs grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($programs as $program)
                <div class="group bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 p-6 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-xl border {{ $program['color'] }} flex items-center justify-center text-2xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas {{ $program['icon'] }}"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $program['title'] }}</h3>
                    <p class="text-gray-600 text-sm">{{ $program['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

