<?php
$events = [
    [
        'title' => 'Kajian Spesial Subuh',
        'date' => '2025-07-06',
        'location' => 'Masjid Al-Ikhlash',
        'description' => 'Kajian bersama Ustadz Hanan Attaki. Ajak keluarga dan teman!',
    ],
    [
        'title' => 'Santunan Anak Yatim',
        'date' => '2025-07-07',
        'location' => 'Aula Serbaguna',
        'description' => 'Penyaluran dana infaq untuk anak yatim binaan.',
    ],
    [
        'title' => 'Pelatihan Pemulasaraan Jenazah',
        'date' => '2025-07-13',
        'location' => 'Ruang Serbaguna Masjid',
        'description' => 'Pelatihan praktis dan teoritis untuk umum.',
    ],
];

?>
<section class="bg-gradient-to-b from-green-50 to-white py-16 px-6">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-green-800 relative inline-block">
                Upcoming Events
                <span class="absolute bottom-[-8px] left-1/2 transform -translate-x-1/2 w-16 h-1 bg-gradient-to-r from-green-500 to-teal-400 rounded-full"></span>
            </h2>
            <p class="text-lg text-green-600 mt-4 max-w-2xl mx-auto">Discover our upcoming programs and activities</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($events as $event)
                <div class="group relative bg-white border border-green-100 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-1 h-full">
                    <!-- Date ribbon -->
                    <div class="absolute top-4 right-4 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full z-10">
                        {{ \Carbon\Carbon::parse($event['date'])->format('d M') }}
                    </div>

                    <div class="p-6 flex flex-col h-full">
                        <!-- Event details -->
                        <div class="flex items-center gap-3 text-green-600 mb-3">
                            <div class="p-2 bg-green-100 rounded-full">
                                <i class="fas fa-calendar-alt text-green-600"></i>
                            </div>
                            <span class="text-sm font-medium">
                                {{ \Carbon\Carbon::parse($event['date'])->translatedFormat('l, F Y') }}
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-green-700 transition-colors">
                            {{ $event['title'] }}
                        </h3>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            {{ $event['description'] }}
                        </p>

                        <div class="flex items-center gap-3 text-sm text-gray-500 mt-auto">
                            <div class="p-2 bg-gray-100 rounded-full">
                                <i class="fas fa-map-marker-alt text-gray-600"></i>
                            </div>
                            <span>{{ $event['location'] }}</span>
                        </div>

                        <!-- Action button -->
                        <div class="mt-6 pt-4 border-t border-gray-100">
                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-green-600 hover:text-white border border-green-600 rounded-lg hover:bg-gradient-to-r from-green-600 to-teal-500 transition-all duration-300">
                                View Details
                                <i class="fas fa-arrow-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- View all button -->
        <div class="mt-12 text-center">
            <a href="#" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-teal-500 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02]">
                View All Events
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>
