@extends('layouts.admin.app')
@section('title', 'Edit Profil')

@section('content')
<!-- Hero Header -->
{{-- <section class="relative bg-gradient-to-b from-green-600 to-green-700 py-16 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-500 rounded-full blur-[100px] opacity-20"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-400 rounded-full blur-[100px] opacity-20"></div>

    <div class="relative z-10 max-w-4xl mx-auto text-center">
        <div class="inline-flex items-center justify-center gap-4 mb-4">
            <div class="w-16 h-1 bg-white/50 rounded-full"></div>
            <span class="text-white/90 uppercase tracking-widest text-sm font-medium">Profil Masjid</span>
            <div class="w-16 h-1 bg-white/50 rounded-full"></div>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
            <span class="text-white/90">Edit</span> Profil Masjid
        </h1>
        <p class="text-white/80 max-w-2xl mx-auto">
            Kelola identitas dan informasi utama masjid
        </p>
    </div>
</section> --}}
<!-- Form Section -->
<section class="relative bg-white py-12 px-6 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full blur-[100px] opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-green-50 rounded-full blur-[100px] opacity-40"></div>

    <div class="relative z-10 w-full mx-auto">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-green-100/50">
            <!-- Form Header -->
            <div class="bg-green-600 px-8 py-6">
                <h2 class="text-xl font-semibold text-white flex items-center gap-3">
                    <i class="fas fa-mosque"></i>
                    Formulir Profil Masjid
                </h2>
            </div>

            <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Nama Masjid -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            <span class="text-green-600">*</span> Nama Masjid
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                <i class="fas fa-mosque"></i>
                            </div>
                            <input type="text" name="nama" value="{{ old('nama', $profil->nama) }}"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="Nama resmi masjid" required />
                        </div>
                        <p class="text-xs text-gray-500">Nama lengkap masjid sesuai akta</p>
                    </div>

                    <!-- Tahun Berdiri -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            <span class="text-green-600">*</span> Tahun Berdiri
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <input type="text" name="tahun_berdiri" value="{{ old('tahun_berdiri', $profil->tahun_berdiri) }}"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="Tahun berdiri masjid" required />
                        </div>
                        <p class="text-xs text-gray-500">Tahun awal pembangunan masjid</p>
                    </div>

                    <!-- Luas Tanah -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            <span class="text-green-600">*</span> Luas Tanah (m²)
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                <i class="fas fa-ruler-combined"></i>
                            </div>
                            <input type="text" name="luas_tanah" value="{{ old('luas_tanah', $profil->luas_tanah) }}"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="Luas tanah dalam meter persegi" required />
                        </div>
                        <p class="text-xs text-gray-500">Total luas tanah masjid</p>
                    </div>

                    <!-- Visi -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            Visi Masjid
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                <i class="fas fa-eye"></i>
                            </div>
                            <textarea name="visi" rows="4"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="Visi dan tujuan masjid">{{ old('visi', $profil->visi) }}</textarea>
                        </div>
                        <p class="text-xs text-gray-500">Pandangan dan tujuan jangka panjang masjid</p>
                    </div>

                    <!-- Tentang Kami -->
                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">
                            Tentang Kami
                        </label>
                        <div class="relative">
                            <div class="absolute top-4 left-4 text-green-600">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <textarea name="isi" rows="6"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="Deskripsi lengkap tentang masjid">{{ old('isi', $profil->tentangKami->isi ?? '') }}</textarea>
                        </div>
                        <p class="text-xs text-gray-500">Sejarah dan profil lengkap masjid</p>
                    </div>

                    <!-- Social Media Links -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            Instagram
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <input type="text" name="ig" value="{{ old('ig', $profil->ig) }}"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="Username Instagram" />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            Facebook
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                <i class="fab fa-facebook"></i>
                            </div>
                            <input type="text" name="fb" value="{{ old('fb', $profil->fb) }}"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="Link Facebook" />
                        </div>
                        <p class="text-xs text-gray-500">Profil Link</p>

                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            YouTube
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                <i class="fab fa-youtube"></i>
                            </div>
                            <input type="text" name="yt" value="{{ old('yt', $profil->yt) }}"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="Link YouTube" />
                        </div>
                        <p class="text-xs text-gray-500">Username Youtube</p>

                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            WhatsApp
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <input type="text" name="wa" value="{{ old('wa', $profil->wa) }}"
                                class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                                placeholder="Nomor WhatsApp" />
                        </div>

                    </div>

                    <!-- Logo -->
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                Logo Masjid
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                    <i class="fas fa-image"></i>
                                </div>
                                <input type="file" name="logo"
                                    class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300" />
                            </div>
                            <p class="text-xs text-gray-500">Ukuran maksimal 2MB (format: PNG transparan)</p>
                        </div>
                        @if ($profil->logo)
                        <div class="mt-4 border border-green-100 rounded-lg p-4">
                            <p class="text-sm font-medium text-gray-700 mb-2">Logo Saat Ini:</p>
                            <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo Masjid"
                                class="w-32 h-32 object-contain rounded-lg shadow-md border border-gray-200">
                        </div>
                        @endif
                    </div>

                    <!-- Background -->
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                Background
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                                    <i class="fas fa-image"></i>
                                </div>
                                <input type="file" name="background"
                                    class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300" />
                            </div>
                            <p class="text-xs text-gray-500">Ukuran maksimal 5MB (format: JPG/PNG)</p>
                        </div>
                        @if ($profil->background)
                        <div class="mt-4 border border-green-100 rounded-lg p-4">
                            <p class="text-sm font-medium text-gray-700 mb-2">Background Saat Ini:</p>
                            <img src="{{ asset('storage/' . $profil->background) }}" alt="Background Masjid"
                                class="w-full h-48 object-cover rounded-lg shadow-md border border-gray-200">
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="mt-8 space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        Link Google Maps (Embed)
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-green-600">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <input type="text" name="map" value="{{ old('map', $profil->kontak->map ?? '') }}"
                            class="pl-12 block w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-300"
                            placeholder="https://maps.google.com/embed?..." />
                    </div>
                    <p class="text-xs text-gray-500">Link embed untuk menampilkan peta lokasi</p>
                </div>

                <!-- Map Preview -->
                @if ($profil->kontak && $profil->kontak->map)
                <div class="mt-8 space-y-3">
                    <label class="block text-sm font-medium text-gray-700">
                        Pratinjau Peta Lokasi
                    </label>
                    <div class="rounded-xl overflow-hidden shadow-lg border-2 border-green-100">
                        <iframe src="{{ $profil->kontak->map }}"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <p class="text-xs text-gray-500 text-right">Pastikan lokasi yang ditampilkan sudah tepat</p>
                </div>
                @endif

                <!-- Form Actions -->
                <div class="mt-12 flex flex-col sm:flex-row justify-end gap-4">
                    <a href="{{ route('admin.profil.index') }}"
                        class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                    <button type="submit"
                        class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
