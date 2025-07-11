@extends('layouts.admin.app')

@section('title', 'Edit Amalan')

@section('content')
<div class="bg-white shadow rounded-xl p-6 lg:p-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Amalan</h2>

    <form action="{{ route('admin.amalans.update', $amalan->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Penting untuk metode UPDATE --}}

        <div class="mb-4">
            <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori:</label>
            <select name="kategori" id="kategori" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('kategori') border-red-500 @enderror" required>
                <option value="">Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori }}" {{ (old('kategori') == $kategori || $amalan->kategori == $kategori) ? 'selected' : '' }}>{{ $kategori }}</option>
                @endforeach
            </select>
            @error('kategori')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nama_amalan" class="block text-gray-700 text-sm font-bold mb-2">Nama Amalan:</label>
            <input type="text" name="nama_amalan" id="nama_amalan" value="{{ old('nama_amalan', $amalan->nama_amalan) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama_amalan') border-red-500 @enderror" required>
            @error('nama_amalan')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi (Opsional):</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $amalan->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="waktu" class="block text-gray-700 text-sm font-bold mb-2">Waktu / Keterangan Tambahan (Opsional):</label>
            <input type="text" name="waktu" id="waktu" value="{{ old('waktu', $amalan->waktu) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('waktu') border-red-500 @enderror">
            @error('waktu')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="urutan" class="block text-gray-700 text-sm font-bold mb-2">Urutan (Opsional, Angka):</label>
            <input type="number" name="urutan" id="urutan" value="{{ old('urutan', $amalan->urutan) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('urutan') border-red-500 @enderror">
            @error('urutan')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition-all">
                Perbarui Amalan
            </button>
            <a href="{{ route('admin.amalans.index') }}" class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition-all">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection