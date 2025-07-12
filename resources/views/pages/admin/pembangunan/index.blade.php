@extends('layouts.admin.app')
@section('title', 'Kelola Pembangunan')

@section('content')
<section class="relative bg-white py-16 px-6 overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full blur-[100px] opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-50 rounded-full blur-[100px] opacity-40"></div>

    <div class="relative z-10 max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-3 mb-4">
                <div class="w-12 h-1 bg-green-600 rounded-full"></div>
                <span class="text-green-600 uppercase tracking-widest text-sm font-medium">Admin Panel</span>
                <div class="w-12 h-1 bg-green-600 rounded-full"></div>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Kelola Tahapan Pembangunan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Kelola semua tahapan pembangunan masjid, mulai dari perencanaan hingga penyelesaian.
            </p>
        </div>

        <!-- Add New Button -->
        <div class="flex justify-end mb-8">
            <a href="{{ route('admin.pembangunan.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambah Tahapan Baru
            </a>
        </div>

        <!-- Timeline Cards -->
        <div class="relative space-y-12">
            @foreach($pembangunans->sortBy('urutan') as $item)
                <div class="group relative w-full flex flex-col md:flex-row items-center {{ $loop->iteration % 2 == 0 ? 'md:flex-row-reverse' : '' }}">
                    <!-- Timeline Content -->
                    <div class="md:w-1/2 md:px-12 mb-6 md:mb-0 relative">
                        <div class="bg-white border border-green-200 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-bold text-gray-800">{{ $item->judul }}</h3>
                                <span class="text-sm bg-green-100 text-green-800 px-3 py-1 rounded-full">{{ $item->urutan }}</span>
                            </div>
                            <p class="text-gray-600 mb-3"><i class="far fa-calendar-alt mr-2 text-green-600"></i> {{ $item->tanggal }}</p>
                            <p class="text-gray-700 mb-4">{{ $item->deskripsi }}</p>

                            <!-- Admin Actions -->
                            <div class="flex justify-end space-x-3 mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <a href="{{ route('admin.pembangunan.edit', $item) }}"
                                   class="text-blue-600 hover:text-blue-800 transition-colors"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.pembangunan.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tahapan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:text-red-800 transition-colors"
                                            title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Image -->
                    <div class="md:w-1/2 md:px-12 relative">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                 alt="{{ $item->judul }}"
                                 class="rounded-xl shadow-md w-full h-auto transition-transform duration-300 group-hover:scale-105">
                        @else
                            <div class="bg-gray-200 rounded-xl w-full h-48 flex items-center justify-center text-gray-500">
                                <i class="far fa-image fa-2x"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Timeline Connector -->
                    @if(!$loop->last)
                        <div class="hidden md:block absolute left-1/2 top-full h-12 w-0.5 bg-green-200 -translate-x-1/2"></div>
                    @endif
                </div>
            @endforeach

            <!-- Add New Card at the End -->
            <div class="flex justify-center mt-12">
                <a href="{{ route('admin.pembangunan.create') }}"
                   class="w-full max-w-md flex flex-col items-center justify-center border-2 border-dashed border-green-300 rounded-xl p-8 hover:bg-green-50 transition-colors duration-300 group">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center text-green-600 mb-4 group-hover:bg-green-200 transition-colors duration-300">
                        <i class="fas fa-plus text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-700 mb-2">Tambah Tahapan Baru</h3>
                    <p class="text-sm text-gray-500 text-center">Klik untuk menambahkan tahapan pembangunan baru</p>
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-green-50 rounded-xl p-6 text-center border border-green-100">
                <div class="text-4xl font-bold text-green-600 mb-2">{{ $pembangunans->count() }}</div>
                <div class="text-gray-700">Tahap Pembangunan</div>
            </div>
            <div class="bg-green-50 rounded-xl p-6 text-center border border-green-100">
                <div class="text-4xl font-bold text-green-600 mb-2">{{ $pembangunans->count() * 2 }}</div>
                <div class="text-gray-700">Bulan Pengerjaan</div>
            </div>
            <div class="bg-green-50 rounded-xl p-6 text-center border border-green-100">
                <div class="text-4xl font-bold text-green-600 mb-2">{{ $pembangunans->count() * 10 }}</div>
                <div class="text-gray-700">Relawan Terlibat</div>
            </div>
            <div class="bg-green-50 rounded-xl p-6 text-center border border-green-100">
                <div class="text-4xl font-bold text-green-600 mb-2">{{ $pembangunans->count() * 50 }}</div>
                <div class="text-gray-700">Donatur Berpartisipasi</div>
            </div>
        </div>
    </div>
</section>
@endsection
