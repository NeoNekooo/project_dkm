@extends('layouts.admin.app') {{-- atau layout yang kamu pakai --}}

@section('title', 'Buat Postingan Baru')

@section('content')
<script src="https://cdn.tiny.cloud/1/so6svm2f5nsu2aero1koqx9638nbare61kxc663hdhv0dkgx/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#body',
        plugins: 'lists link image code',
        toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
        height: 400,
        menubar: false
    });
</script>

<div class="max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Buat Postingan Blog Baru</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-xl shadow">
        @csrf

        <!-- Judul -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required>
        </div>

        <!-- Slug -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Slug (Opsional, otomatis jika dikosongkan)</label>
            <input type="text" name="slug" class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>

        <!-- Ringkasan -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Ringkasan</label>
            <textarea name="excerpt" rows="3" class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required></textarea>
        </div>

        <!-- Konten -->
        <div>
            <label for="body" class="block font-medium text-sm text-gray-700">Isi Konten</label>
            <textarea name="body" id="body" class="form-control mt-1 block w-full" rows="10">{{ old('body', $post->body ?? '') }}</textarea>

        </div>

        <!-- Gambar -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Thumbnail / Gambar</label>
            <input type="file" name="thumbnail" class="mt-1 block w-full text-sm text-gray-600">
        </div>

        <!-- Tanggal Publish -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Tanggal Publish</label>
            <input type="date" name="published_at" class="mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
            @php
                $kategoriList = ['Kajian', 'Informasi', 'Artikel Islami', 'Berita Masjid', 'Agenda'];
                $selected = old('kategori', $post->kategori ?? []);
                $selected = is_array($selected) ? $selected : json_decode($selected, true);
            @endphp

            <div class="space-y-2">
                @foreach ($kategoriList as $kategori)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="kategori[]"
                               value="{{ $kategori }}"
                               {{ in_array($kategori, $selected ?? []) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                        <span class="ml-2">{{ $kategori }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Status Publish -->
        <div class="flex items-center gap-2">
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" name="is_published" value="1">
            <label for="is_published" class="text-sm text-gray-700">Tampilkan ke publik</label>
        </div>

        <!-- Tombol -->
        <div class="pt-4">
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">Simpan</button>
        </div>
    </form>
</div>
@endsection
