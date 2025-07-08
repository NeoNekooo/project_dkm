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
        <!-- Gallery Header -->
        <div class="bg-green-600 rounded-t-2xl px-8 py-6 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-white flex items-center gap-3">
                <i class="fas fa-images"></i>
                Dokumentasi Kegiatan
            </h2>
            <a href="{{ route('admin.gallery.create') }}" class="px-4 py-2 bg-white text-green-600 font-medium rounded-lg hover:bg-gray-100 transition-all duration-300 flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Tambah Foto
            </a>
        </div>

        <!-- Gallery Grid -->
        <div class="bg-white rounded-b-2xl shadow-xl border border-t-0 border-green-100/50 p-8">
            @if($imgs->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($imgs as $item)
                <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-green-100">
                    <img src="{{ asset('storage/' . $item->path) }}" alt="{{ $item->name }}" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <h3 class="text-white font-medium text-lg">{{ $item->name }}</h3>
                        <p class="text-white/80 text-sm">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
                    </div>
                    <div class="absolute top-3 right-3 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <a href="{{ route('admin.gallery.edit', $item->id) }}" class="p-2 bg-white/90 text-green-600 rounded-full hover:bg-white transition-all">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-white/90 text-red-600 rounded-full hover:bg-white transition-all">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @else
                <p class="text-center text-gray-500">Belum ada foto yang diunggah.</p>
            @endif

            <!-- Pagination -->

        </div>
    </div>
</section>
@endsection
