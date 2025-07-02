@php
    $programs = [
        [
            'title' => 'Pembangunan',
            'desc' => 'Renovasi dan pembangunan fasilitas ibadah secara berkelanjutan.',
            'icon' => 'fa-building',
            'color' => 'bg-yellow-100 text-yellow-700',
        ],
        [
            'title' => 'Dakwah',
            'desc' => 'Kajian rutin, ceramah, dan kegiatan syiar Islam.',
            'icon' => 'fa-mosque',
            'color' => 'bg-green-100 text-green-700',
        ],
        [
            'title' => 'Sosial',
            'desc' => 'Santunan anak yatim, bantuan sembako, dan bakti masyarakat.',
            'icon' => 'fa-hands-helping',
            'color' => 'bg-blue-100 text-blue-700',
        ],
        [
            'title' => 'ZIS',
            'desc' => 'Pengelolaan Zakat, Infaq, dan Shodaqoh secara transparan.',
            'icon' => 'fa-coins',
            'color' => 'bg-purple-100 text-purple-700',
        ],
    ];
@endphp

<section class="py-16 bg-slate-950 px-4 bg-base-200">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl md:text-4xl font-bold text-white text-center mb-10">Program Utama Masjid</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      @foreach ($programs as $program)
        <div class="card bg-white shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100">
          <div class="card-body flex items-center gap-6">
            <div class="p-4 m-4 rounded-full {{ $program['color'] }}">
              <i class="fas {{ $program['icon'] }} text-3xl"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold text-gray-800">{{ $program['title'] }}</h3>
              <p class="text-sm text-gray-600">{{ $program['desc'] }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
