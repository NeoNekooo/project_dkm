<section class="bg-gradient-to-b from-green-50 to-white py-16 px-6">
    <div class="max-w-6xl mx-auto" x-data="{ showAll: false }">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-green-800 relative inline-block">
                Berita & Kegiatan Terbaru
                <span class="absolute bottom-[-8px] left-1/2 transform -translate-x-1/2 w-16 h-1 bg-gradient-to-r from-green-500 to-teal-400 rounded-full"></span>
            </h2>
            <p class="text-lg text-green-600 mt-4 max-w-2xl mx-auto">
                Informasi terkini dari Masjid Al-Ikhlash untuk Jama'ah yang lebih tahu dan peduli.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach ($posts as $index => $post)
                <div
                    x-show="showAll || {{ $index }} < 4"
                    x-transition
                    class="group relative bg-white border border-green-100 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-1 h-full"
                >
                    <figure class="overflow-hidden h-48 relative">
                        <img src="{{ asset('storage/' . $post->thumbnail) }}"
                             alt="{{ $post->title }}"
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </figure>

                    <div class="p-6 flex flex-col flex-grow space-y-3">
                        <div class="flex flex-wrap gap-2">
                            @foreach ($post->kategori ?? [] as $tag)
                                @php
                                    $badgeClass = match($tag) {
                                        'Agenda' => 'bg-amber-100/80 text-amber-800 border-amber-200',
                                        'Kajian' => 'bg-blue-100/80 text-blue-800 border-blue-200',
                                        'Informasi' => 'bg-emerald-100/80 text-emerald-800 border-emerald-200',
                                        default => 'bg-gray-100 text-gray-800 border-gray-200',
                                    };
                                @endphp
                                <span class="px-2 py-1 rounded-full text-xs font-semibold border {{ $badgeClass }}">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>

                        <h3 class="text-lg font-bold text-gray-800 group-hover:text-green-700 transition-colors">
                            {{ $post->title }}
                        </h3>

                        <p class="text-sm text-gray-600 line-clamp-2">
                            {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 100) }}
                        </p>

                        <div class="mt-auto pt-4 border-t border-gray-100/50">
                            <a href="{{ route('blog.detail', $post->slug) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-green-600 hover:text-white border border-green-600/50 rounded-lg hover:bg-gradient-to-r from-green-600 to-teal-500 transition-all duration-300 group-hover:border-transparent">
                                Baca Selengkapnya
                                <i class="fas fa-arrow-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tombol Lihat Semua -->
        <div class="mt-12 text-center">
            <button
                x-show="!showAll"
                @click="showAll = true"
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-teal-500 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02]"
            >
                Lihat Semua Berita
                <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>
    </div>
</section>
