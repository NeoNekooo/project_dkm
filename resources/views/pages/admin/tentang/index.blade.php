@extends('layouts.admin.app')
@section('title', 'Edit Tentang Kami')

@section('content')
    <h1>Edit Tentang Kami</h1>
    <div class="container mx-auto mt-6 bg-white rounded-xl p-6 shadow">
        <form action="{{ route('admin.tentang.update', $tentang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nama Ketua -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Ketua DKM</label>
                    <input type="text" name="nama_ketua" value="{{ old('nama_ketua', $tentang->nama_ketua) }}"
                        class="mt-1 block w-full border border-gray-300 rounded p-2" />
                </div>

                <!-- Sejarah Ketua -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Sejarah Ketua DKM</label>
                    <textarea name="sejarah_ketua" rows="4" class="mt-1 block w-full border border-gray-300 rounded p-2">{{ old('sejarah_ketua', $tentang->sejarah_ketua) }}</textarea>
                </div>


                <!-- Foto Ketua -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Foto Ketua DKM</label>
                    <input type="file" name="foto_ketua" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    @if ($tentang->foto_ketua)
                        <img src="{{ asset('storage/' . $tentang->foto_ketua) }}" alt="Foto Ketua"
                            class="w-32 mt-2 rounded shadow">
                    @endif
                </div>

                <!-- Foto Masjid -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Foto Masjid</label>
                    <input type="file" name="foto_masjid" class="mt-1 block w-full border border-gray-300 rounded p-2" />
                    @if ($tentang->foto_masjid)
                        <img src="{{ asset('storage/' . $tentang->foto_masjid) }}" alt="Foto Masjid"
                            class="w-32 mt-2 rounded shadow">
                    @endif
                </div>
            </div>

            <!-- Isi Tentang Kami -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700">Isi Tentang Kami</label>
                <textarea name="isi" rows="6" class="mt-1 block w-full border border-gray-300 rounded p-2">{{ old('isi', $tentang->isi) }}</textarea>
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
