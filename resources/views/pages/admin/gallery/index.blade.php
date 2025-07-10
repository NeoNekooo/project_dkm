@extends('layouts.admin.app')
@section('title', 'Galeri Masjid')

@section('content')
<!-- Hero Header -->
<section class="relative bg-gradient-to-b from-green-600 to-green-700 py-16 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-500 rounded-full blur-[100px] opacity-20"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-400 rounded-full blur-[100px] opacity-20"></div>

    <div class="relative z-10 max-w-4xl mx-auto text-center">
        <div class="inline-flex items-center justify-center gap-4 mb-4">
            <div class="w-16 h-1 bg-white/50 rounded-full"></div>
            <span class="text-white/90 uppercase tracking-widest text-sm font-medium">Media Masjid</span>
            <div class="w-16 h-1 bg-white/50 rounded-full"></div>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
            <span class="text-white/90">Galeri</span> Masjid
        </h1>
        <p class="text-white/80 max-w-2xl mx-auto">
            Kumpulan foto dan dokumentasi kegiatan masjid
        </p>
    </div>
</section>

<!-- Gallery Section -->
<section class="relative bg-white py-12 px-6 overflow-hidden">
    <div class="relative z-10 max-w-6xl mx-auto">
        <!-- Gallery Header with Search and Add -->
        <div class="bg-green-600 rounded-t-2xl px-8 py-6 flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="text-xl font-semibold text-white flex items-center gap-3">
                <i class="fas fa-images"></i>
                Dokumentasi Kegiatan
            </h2>

            <div class="flex items-center gap-4 w-full sm:w-auto">
                {{-- <div class="relative flex-1 sm:w-64">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-green-600">
                        <i class="fas fa-search"></i>
                    </div>
                    <input
                        type="text"
                        class="pl-10 w-full border border-gray-200 rounded-lg p-2.5 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                        placeholder="Cari foto..."
                        x-model="searchQuery"
                        @input.debounce.300ms="filterGallery()">
                </div> --}}

                <a href="{{ route('admin.gallery.create') }}"
                   class="px-4 py-2 bg-white text-green-600 font-medium rounded-lg hover:bg-gray-100 transition-all duration-300 flex items-center whitespace-nowrap">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Foto
                </a>
            </div>
        </div>

        <!-- Gallery Content & Alpine Data -->
        <div class="bg-white rounded-b-2xl shadow-xl border border-t-0 border-green-100/50 p-8"
        x-data="{
            searchQuery: '',
            originalItems: {{ Js::from($imgs->items()) }},
            filteredItems: {{ Js::from($imgs->items()) }},
            showDeleteModal: false,
            showEditModal: false,
            itemId: null,
            itemName: '',
            itemTag: '',
            itemTanggal: '',
            filterGallery() {
                if (!this.searchQuery) {
                    this.filteredItems = this.originalItems;
                    return;
                }
                const query = this.searchQuery.toLowerCase();
                this.filteredItems = this.originalItems.filter(item =>
                    item.name.toLowerCase().includes(query) ||
                    item.tag.toLowerCase().includes(query) ||
                    item.tanggal.includes(query)
                );
            },
            openDeleteModal(id, name) {
                this.itemId = id;
                this.itemName = name;
                this.showDeleteModal = true;
            },
            openEditModal(item) {
                this.itemId = item.id;
                this.itemName = item.name;
                this.itemTag = item.tag;
                this.itemTanggal = item.tanggal;
                this.showEditModal = true;
            }
        }"

             x-cloak
             @keydown.window.escape="showDeleteModal  = false">

            <!-- Filter Tags -->
            <div class="flex flex-wrap gap-2 mb-6">
                <button
                    class="px-3 py-1 text-sm rounded-full border border-green-200 hover:bg-green-50 transition-colors"
                    @click="searchQuery = ''; filterGallery()">
                    Semua
                </button>
                @foreach($tags as $tag)
                    <button
                        class="px-3 py-1 text-sm rounded-full border border-green-200 hover:bg-green-50 transition-colors"
                        @click="searchQuery = '{{ $tag }}'; filterGallery()">
                        {{ $tag }}
                    </button>
                @endforeach
            </div>

            <!-- Gallery Grid -->
            <template x-if="filteredItems.length > 0">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <template x-for="item in filteredItems" :key="item.id">
                        <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-green-100">
                            <img
                                :src="`/storage/${item.path}`"
                                :alt="item.name"
                                class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105"
                                loading="lazy">

                            <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                                <h3 class="text-white font-medium text-lg" x-text="item.name"></h3>
                                <p class="text-white/80 text-sm" x-text="new Date(item.tanggal).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })"></p>
                            </div>

                            <div class="absolute top-3 right-3 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <button
                                class="p-2 bg-white/90 text-green-600 rounded-full hover:bg-white transition-all"
                                @click="openEditModal(item)">
                                <i class="fas fa-edit"></i>
                            </button>

                                <button
                                    class="p-2 bg-white/90 text-red-600 rounded-full hover:bg-white transition-all"
                                    @click="openDeleteModal(item.id, item.name)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            <template x-if="filteredItems.length === 0">
                <div class="text-center py-12">
                    <i class="fas fa-image text-gray-300 text-5xl mb-4"></i>
                    <p class="text-gray-500" x-text="searchQuery ? 'Tidak ditemukan foto yang sesuai' : 'Belum ada foto yang diunggah'"></p>
                    <template x-if="searchQuery">
                        <button @click="searchQuery = ''; filterGallery()" class="mt-4 text-green-600 hover:underline">
                            Tampilkan semua foto
                        </button>
                    </template>
                </div>
            </template>

            @if($imgs->hasPages())
                <div class="mt-8">
                    {{ $imgs->links() }}
                </div>
            @endif

            <!-- Delete Modal -->
            <div x-show="showDeleteModal "
                 class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                <div @click.away="showDeleteModal  = false"
                     x-show="showDeleteModal "
                     class="bg-white rounded-xl shadow-xl w-full max-w-md"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95">

                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-2 rounded-full bg-red-100 text-red-600">
                                <i class="fas fa-exclamation-circle text-xl"></i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Konfirmasi Penghapusan</h3>
                        </div>

                        <p class="text-gray-600 mb-6">
                            Anda yakin ingin menghapus foto <span class="font-semibold" x-text="itemName"></span>? Tindakan ini tidak dapat dibatalkan.
                        </p>

                        <div class="flex justify-end gap-3">
                            <button @click="showDeleteModal  = false"
                                    class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                                Batal
                            </button>

                            <form :action="`/admin/gallery/${itemId}`" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-4 py-2 bg-red-600 text-white hover:bg-red-700 rounded-lg transition-colors">
                                    Ya, Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit Modal -->
<div x-show="showEditModal"
class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4"
x-transition:enter="ease-out duration-300"
x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100"
x-transition:leave="ease-in duration-200"
x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0">

<div @click.away="showEditModal = false"
    x-show="showEditModal"
    class="bg-white rounded-xl shadow-xl w-full max-w-lg"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95">

   <form :action="`/admin/gallery/${itemId}`" method="POST">
       @csrf
       @method('PUT')
       <div class="p-6 space-y-4">
           <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
               <i class="fas fa-edit text-green-600"></i> Edit Foto
           </h3>

           <div>
               <label class="block text-sm text-gray-700 mb-1">Nama Foto</label>
               <input type="text" name="name" x-model="itemName" required
                      class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-green-500" />
           </div>

           <div>
               <label class="block text-sm text-gray-700 mb-1">Tag</label>
               <input type="text" name="tag" x-model="itemTag" required
                      class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-green-500" />
           </div>

           <div>
               <label class="block text-sm text-gray-700 mb-1">Tanggal</label>
               <input type="date" name="tanggal" x-model="itemTanggal" required
                      class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-green-500" />
           </div>

           <div class="flex justify-end gap-3 pt-4">
               <button type="button" @click="showEditModal = false"
                       class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors">
                   Batal
               </button>
               <button type="submit"
                       class="px-4 py-2 bg-green-600 text-white hover:bg-green-700 rounded-lg transition-colors">
                   Simpan Perubahan
               </button>
           </div>
       </div>
   </form>
</div>
</div>

        </div>
    </div>
</section>
@endsection
