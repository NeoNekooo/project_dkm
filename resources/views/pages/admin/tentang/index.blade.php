@extends('layouts.admin.app')
@section('title', 'Kelola Tentang Kami')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kelola Tentang Kami</h1>
        <div class="flex items-center space-x-2">
            <a href="{{ route('admin.dashboard') }}"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Form Container -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.tentang.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Form Header -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4 text-white">
                <h2 class="text-lg font-semibold">
                    <i class="fas fa-mosque mr-2"></i> Informasi Tentang Masjid
                </h2>
            </div>

            <!-- Form Body -->
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Ketua -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-user-tie text-green-600 mr-1"></i> Nama Ketua DKM
                    </label>
                    <input type="text" name="nama_ketua" value="{{ old('nama_ketua', $tentang->nama_ketua) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
                </div>

                <!-- Sejarah Ketua -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-book-open text-green-600 mr-1"></i> Sejarah Ketua
                    </label>
                    <textarea name="sejarah_ketua" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">{{ old('sejarah_ketua', $tentang->sejarah_ketua) }}</textarea>
                </div>

                <!-- Foto Ketua -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-image text-green-600 mr-1"></i> Foto Ketua DKM
                    </label>
                    <input type="file" name="foto_ketua"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
                    @if ($tentang->foto_ketua)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $tentang->foto_ketua) }}" alt="Foto Ketua"
                                class="max-w-xs rounded-lg border border-gray-200">
                        </div>
                    @endif
                </div>

                <!-- Foto Masjid -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-image text-green-600 mr-1"></i> Foto Masjid
                    </label>
                    <input type="file" name="foto_masjid"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
                    @if ($tentang->foto_masjid)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $tentang->foto_masjid) }}" alt="Foto Masjid"
                                class="max-w-xs rounded-lg border border-gray-200">
                        </div>
                    @endif
                </div>

                <!-- Isi Tentang Kami -->
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-align-left text-green-600 mr-1"></i> Isi Tentang Kami
                    </label>
                    <textarea name="isi" rows="6"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">{{ old('isi', $tentang->isi) }}</textarea>
                </div>
            </div>

            <!-- Form Footer -->
            <div class="bg-gray-50 px-6 py-4 flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow-md transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
