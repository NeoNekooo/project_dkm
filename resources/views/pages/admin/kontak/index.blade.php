@extends('layouts.admin.app')
@section('title', 'Edit Kontak')

@section('content')
<section class="relative bg-white py-6 sm:py-8 md:py-12 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="absolute top-0 right-0 w-48 sm:w-64 h-48 sm:h-64 bg-green-100 rounded-full blur-[80px] sm:blur-[100px] opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-60 sm:w-80 h-60 sm:h-80 bg-green-50 rounded-full blur-[80px] sm:blur-[100px] opacity-40"></div>

    <div class="relative w-full max-w-screen-xl mx-auto lg:px-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-green-100">
            <div class="bg-green-600 px-4 sm:px-6 py-4 sm:py-6">
                <h2 class="text-lg sm:text-xl font-semibold text-white flex items-center gap-2 sm:gap-3">
                    <i class="fas fa-mosque text-sm sm:text-base"></i>
                    Edit Kontak Masjid
                </h2>
            </div>
            <form action="{{ route('admin.kontak.update', $kontak->id) }}" method="POST" class="p-4 sm:p-6 md:p-8 space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nomor 1 -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon 1</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-green-600">
                                <i class="fas fa-phone text-sm"></i>
                            </div>
                            <input type="text" name="nomer1" value="{{ old('nomer1', $kontak->nomer1) }}"
                                class="pl-10 text-sm block w-full border border-gray-200 rounded-lg p-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="+628123456789" />
                        </div>
                    </div>

                    <!-- Nomor 2 -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon 2</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-green-600">
                                <i class="fas fa-phone text-sm"></i>
                            </div>
                            <input type="text" name="nomer2" value="{{ old('nomer2', $kontak->nomer2) }}"
                                class="pl-10 text-sm block w-full border border-gray-200 rounded-lg p-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="Opsional" />
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-green-600">
                                <i class="fas fa-envelope text-sm"></i>
                            </div>
                            <input type="email" name="email" value="{{ old('email', $kontak->email) }}"
                                class="pl-10 text-sm block w-full border border-gray-200 rounded-lg p-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="masjid@example.com" />
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 text-green-600">
                                <i class="fas fa-map-marker-alt text-sm"></i>
                            </div>
                            <textarea name="alamat" rows="4"
                                class="pl-10 text-sm block w-full border border-gray-200 rounded-lg p-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="Jl. Masjid Agung No. 1, Kota">{{ old('alamat', $kontak->alamat) }}</textarea>
                        </div>
                    </div>

                    <!-- MAP Field -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Link Google Maps (Embed)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-green-600">
                                <i class="fas fa-map-marked-alt text-sm"></i>
                            </div>
                            <input type="text" name="map" value="{{ old('map', $kontak->map) }}"
                                class="pl-10 text-sm block w-full border border-gray-200 rounded-lg p-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="https://maps.google.com/embed?..." />
                        </div>
                    </div>
                </div>

                <!-- MAP Preview -->
                @if($kontak->map)
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pratinjau Lokasi</label>
                    <div class="rounded-lg overflow-hidden shadow border border-green-100">
                        <iframe src="{{ $kontak->map }}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                @endif

                <div class="mt-6 flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 sm:px-6 sm:py-3 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center">
                        <i class="fas fa-save mr-2 text-sm"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
