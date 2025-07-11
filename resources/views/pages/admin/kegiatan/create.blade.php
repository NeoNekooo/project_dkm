@extends('layouts.admin.app')

@section('title', 'Tambah Kegiatan')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4 text-green-800">Tambah Kegiatan Baru</h1>

    <form action="{{ route('admin.kegiatan.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Judul</label>
            <input type="text" name="judul" value="{{ old('judul') }}" required class="w-full border px-4 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Isi</label>
            <textarea name="isi" rows="5" required class="w-full border px-4 py-2 rounded">{{ old('isi') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Lokasi</label>
            <input type="text" name="lokasi" value="{{ old('lokasi') }}" required class="w-full border px-4 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="w-full border px-4 py-2 rounded">
        </div>

        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Simpan</button>
    </form>
</div>
@endsection
