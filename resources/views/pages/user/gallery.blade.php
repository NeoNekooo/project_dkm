@extends('layouts.user.user')

@section('title', 'event')

@section('content')
{{--
<x-gallery.hero /> --}}

<section class="relative bg-white py-12 px-6 overflow-hidden" x-data="galleryApp()">
    <!-- ...dekorasi dan header... -->

    <div class="relative z-10 max-w-6xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl border border-green-100/50 p-8">

            <!-- Filter + Search -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <!-- Tabs -->
                <div class="flex flex-wrap gap-2">
                    <button @click="selectedCategory = 'all'"
                        :class="selectedCategory === 'all' ? 'bg-green-600 text-white' : 'bg-white text-green-700 border-green-300'"
                        class="px-4 py-2 rounded-full text-sm font-medium border transition-all">
                        Semua
                    </button>
                    <template x-for="cat in categories" :key="cat">
                        <button @click="selectedCategory = cat"
                            x-text="cat"
                            :class="selectedCategory === cat ? 'bg-green-600 text-white' : 'bg-white text-green-700 border-green-300'"
                            class="px-4 py-2 rounded-full text-sm font-medium border transition-all">
                        </button>
                    </template>
                </div>

                <!-- Search -->
                <div class="relative w-full md:w-64">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-green-600 pointer-events-none">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="text" x-model="search"
                        placeholder="Cari foto..."
                        class="pl-10 w-full border border-gray-200 rounded-lg p-2.5 focus:ring-2 focus:ring-green-500">
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <template x-for="img in filteredImages" :key="img.id">
                    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg border border-green-100 transition-all duration-300">
                        <img :src="img.path" :alt="img.name"
                            class="w-full h-48 md:h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                            <h3 class="text-white text-lg font-semibold" x-text="img.name"></h3>
                            <p class="text-white/80 text-sm" x-text="new Date(img.tanggal).toLocaleDateString('id-ID')"></p>
                        </div>
                    </div>
                </template>
            </div>

            <!-- No Result -->
            <div x-show="filteredImages.length === 0" class="text-center text-gray-500 mt-12">
                Tidak ada gambar ditemukan.
            </div>
            @if ($imgs->hasPages())
<div class="mt-8">
    {{ $imgs->links() }}
</div>
@endif

    </div>
</section>

<script>
    function galleryApp() {
        return {
            selectedCategory: 'all',
            search: '',
            categories: @json($tags),
            images: @json($formattedImgs), // ini buat AlpineJS
            get filteredImages() {
                return this.images.filter(img => {
                    const matchTag = this.selectedCategory === 'all' || img.tag === this.selectedCategory;
                    const matchSearch = img.name.toLowerCase().includes(this.search.toLowerCase());
                    return matchTag && matchSearch;
                });
            }
        }
    }
</script>



@endsection
