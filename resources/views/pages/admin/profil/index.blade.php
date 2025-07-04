@extends('layouts.admin.app')
@section('title', 'Edit Profil')

@section('content')
<h1>Edit Profile</h1>
<div class="container mx-auto mt-6 bg-white rounded-xl p-6 shadow">
    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Nama -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Masjid</label>
                <input type="text" name="nama" value="{{ old('nama', $profil->nama) }}"
                    class="mt-1 block w-full border border-gray-300 rounded p-2" />
            </div>

            <!-- Visi -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Visi</label>
                <textarea name="visi" class="mt-1 block w-full border border-gray-300 rounded p-2"
                    rows="4">{{ old('visi', $profil->visi) }}</textarea>
            </div>

            <!-- Tentang Kami -->
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700">Tentang Kami</label>
                <textarea name="tentang_kami" class="mt-1 block w-full border border-gray-300 rounded p-2"
                    rows="4">{{ old('tentang_kami', $profil->tentang_kami) }}</textarea>
            </div>

            <!-- Logo -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Logo</label>
                <input type="file" name="logo" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                @if($profil->logo)
                    <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo" class="w-32 mt-2">
                @endif
            </div>

            <!-- Background -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Background</label>
                <input type="file" name="background" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                @if($profil->background)
                    <img src="{{ asset('storage/' . $profil->background) }}" alt="Background" class="w-32 mt-2">
                @endif
            </div>
        </div>

        <!-- MAP Field -->
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Link Google Maps (Embed)</label>
            <input type="text" name="map" value="{{ old('map', $profil->kontak->map ?? '') }}"
                class="block w-full border border-gray-300 rounded p-2" />
        </div>

        <!-- MAP Preview -->
        @if($profil->kontak && $profil->kontak->map)
        <div class="w-full mt-8">
            <label class="block text-sm font-medium text-gray-700 mb-2">Pratinjau Lokasi</label>
            <div class="rounded-lg overflow-hidden shadow-md">
                <iframe src="{{ $profil->kontak->map }}"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
        @endif

        <div class="mt-6">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
