@extends('layouts.admin.app')
@section('title', 'Edit Kontak')

@section('content')
<h1>Edit Kontak</h1>
<div class="container mx-auto mt-6 bg-white rounded-xl p-6 shadow">
    <form action="{{ route('admin.kontak.update', $kontak->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Nomor 1 -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor 1</label>
                <input type="text" name="nomer1" value="{{ old('nomer1', $kontak->nomer1) }}"
                    class="mt-1 block w-full border border-gray-300 rounded p-2" />
            </div>

            <!-- Nomor 2 -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor 2</label>
                <input type="text" name="nomer2" value="{{ old('nomer2', $kontak->nomer2) }}"
                    class="mt-1 block w-full border border-gray-300 rounded p-2" />
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $kontak->email) }}"
                    class="mt-1 block w-full border border-gray-300 rounded p-2" />
            </div>

            <!-- Alamat -->
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="alamat" rows="3" class="mt-1 block w-full border border-gray-300 rounded p-2">{{ old('alamat', $kontak->alamat) }}</textarea>
            </div>
        </div>

        <!-- MAP Field -->
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Link Google Maps (Embed)</label>
            <input type="text" name="map" value="{{ old('map', $kontak->map) }}"
                class="block w-full border border-gray-300 rounded p-2" />
        </div>

        <!-- MAP Preview -->
        @if($kontak->map)
        <div class="w-full mt-8">
            <label class="block text-sm font-medium text-gray-700 mb-2">Pratinjau Lokasi</label>
            <div class="rounded-lg overflow-hidden shadow-md">
                <iframe src="{{ $kontak->map }}"
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
