@extends('layouts.admin.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Tambah Gambar</h1>

    <!-- Tampilkan error jika ada -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block font-medium mb-1">Nama Gambar</label>
            <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded-lg p-2" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="tanggal" class="block font-medium mb-1">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="w-full border border-gray-300 rounded-lg p-2" value="{{ old('tanggal') }}" required>
        </div>

        <div>
            <label for="tag" class="block font-medium mb-1">Tag</label>
            <input type="text" name="tag" id="tag" class="w-full border border-gray-300 rounded-lg p-2" value="{{ old('tag') }}" required>
        </div>

        <div>
            <label for="image" class="block font-medium mb-1">Upload Gambar</label>
            <input type="file" name="image" id="image" accept="image/*" class="w-full border border-gray-300 rounded-lg p-2" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition">
            Simpan
        </button>
    </form>
@endsection
