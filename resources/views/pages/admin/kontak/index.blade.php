@extends('layouts.admin.app')
@section('title', 'Edit Kontak')

@section('content')
<!-- Header Section -->
{{-- <section class="relative bg-green-600 py-12 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-700 rounded-full blur-[100px] opacity-20"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-500 rounded-full blur-[100px] opacity-20"></div>

    <div class="relative z-10 max-w-6xl mx-auto text-center">
        <div class="inline-flex items-center gap-3 mb-4">
            <div class="w-12 h-1 bg-white rounded-full"></div>
            <span class="text-white uppercase tracking-widest text-sm font-medium">Kontak Masjid</span>
            <div class="w-12 h-1 bg-white rounded-full"></div>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-6">
            Edit Informasi Kontak
        </h1>
    </div> --}}
</section>

<!-- Form Section -->
<section class="relative bg-white py-12 px-6 overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full blur-[100px] opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-50 rounded-full blur-[100px] opacity-40"></div>

    <div class="relative rounded-2xl z-10 w-full mx-auto">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-green-100">
            <div class="bg-green-600 px-8 py-6">
                <h2 class="text-xl font-semibold text-white flex items-center gap-3">
                    <i class="fas fa-mosque"></i>
                    Edit Kontak Masjid
                </h2>
            </div>
            <form action="{{ route('admin.kontak.update', $kontak->id) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Nomor 1 -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon 1</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                <i class="fas fa-phone"></i>
                            </div>
                            <input type="text" name="nomer1" value="{{ old('nomer1', $kontak->nomer1) }}"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="+628123456789" />
                        </div>
                    </div>

                    <!-- Nomor 2 -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon 2</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                <i class="fas fa-phone"></i>
                            </div>
                            <input type="text" name="nomer2" value="{{ old('nomer2', $kontak->nomer2) }}"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="Opsional" />
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input type="email" name="email" value="{{ old('email', $kontak->email) }}"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="masjid@example.com" />
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                        <div class="relative">
                            <div class="absolute top-4 left-4 text-green-600">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <textarea name="alamat" rows="4"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="Jl. Masjid Agung No. 1, Kota">{{ old('alamat', $kontak->alamat) }}</textarea>
                        </div>
                    </div>

                    <!-- MAP Field -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Link Google Maps (Embed)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <input type="text" name="map" value="{{ old('map', $kontak->map) }}"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="https://maps.google.com/embed?..." />
                        </div>
                    </div>
                </div>

                <!-- MAP Preview -->
                @if($kontak->map)
                <div class="mt-10">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Pratinjau Lokasi</label>
                    <div class="rounded-xl overflow-hidden shadow-md border border-green-100">
                        <iframe src="{{ $kontak->map }}"
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                @endif

                <div class="mt-12 flex justify-end">
                    <button type="submit"
                        class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center">
                        <i class="fas fa-save mr-3"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
