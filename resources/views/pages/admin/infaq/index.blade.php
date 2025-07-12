@extends('layouts.admin.app')
@section('title', 'Kelola Infaq')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kelola Informasi Infaq</h1>
        <div class="flex items-center space-x-2">
            <a href="{{ route('admin.dashboard') }}"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Form Container -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.infaq.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Form Header -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4 text-white">
                <h2 class="text-lg font-semibold">
                    <i class="fas fa-hand-holding-heart mr-2"></i> Informasi Infaq Masjid
                </h2>
            </div>

            <!-- Form Body -->
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Headline -->
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-heading text-green-600 mr-1"></i> Judul Infaq
                    </label>
                    <input type="text" name="headline" value="{{ old('headline', $infaq->headline) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
                    @error('headline')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-align-left text-green-600 mr-1"></i> Deskripsi
                    </label>
                    <textarea name="description" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">{{ old('description', $infaq->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bank Information -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-university text-green-600 mr-1"></i> Nomor Rekening
                    </label>
                    <input type="text" name="nomer_rekening" value="{{ old('nomer_rekening', $infaq->nomer_rekening) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
                    @error('nomer_rekening')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-user-tie text-green-600 mr-1"></i> Nama Pemilik Rekening
                    </label>
                    <input type="text" name="nama_rekening" value="{{ old('nama_rekening', $infaq->nama_rekening) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
                    @error('nama_rekening')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Picture Upload -->
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-image text-green-600 mr-1"></i> Gambar Infaq
                    </label>
                    <input type="file" name="picture"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
                    @error('picture')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    @if($infaq->picture)
                        <div class="mt-4">
                            <p class="text-sm text-gray-500 mb-2">Gambar Saat Ini:</p>
                            <img src="{{ asset('storage/' . $infaq->picture) }}" alt="Current Infaq Image"
                                class="max-w-xs rounded-lg border border-gray-200">
                        </div>
                    @endif
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-image text-green-600 mr-1"></i> Gambar Bank
                    </label>
                    <input type="file" name="picture2"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
                    @error('picture2')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    @if($infaq->picture2)
                        <div class="mt-4">
                            <p class="text-sm text-gray-500 mb-2">Gambar Saat Ini:</p>
                            <img src="{{ asset('storage/' . $infaq->picture2) }}" alt="Current Infaq Image"
                                class="max-w-xs rounded-lg border border-gray-200">
                        </div>
                    @endif
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
