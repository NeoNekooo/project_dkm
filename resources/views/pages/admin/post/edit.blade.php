@extends('layouts.admin.app')

@section('title', 'Edit Postingan Blog')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Postingan</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-md text-sm text-red-700">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">slug</label>
            <input type="text" name="title" value="{{ old('title', $post->slug) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

        <!-- Body -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Konten</label>
            <textarea name="body" rows="6" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('body', $post->body) }}</textarea>
        </div>
a
        <!-- Thumbnail -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Thumbnail (opsional)</label>
            @if ($post->thumbnail)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Thumbnail" class="h-32 rounded shadow">
                </div>
            @endif
            <input type="file" name="thumbnail" accept="image/*"
                class="block w-full text-sm text-gray-600">
        </div>

        <!-- Images -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Tambahan (opsional)</label>
            <input type="file" name="images[]" multiple accept="image/*"
                class="block w-full text-sm text-gray-600 mb-2">

            @if ($post->images->count())
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                    @foreach ($post->images as $img)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $img->path) }}" class="rounded shadow h-32 w-full object-cover">
                            <form action="{{ route('admin.post.deleteImage', $img->id) }}" method="POST" onsubmit="return confirm('Hapus gambar ini?')"
                                  class="absolute top-1 right-1 bg-white bg-opacity-75 p-1 rounded hover:bg-opacity-100">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-trash text-red-600 text-sm"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Publish Checkbox -->
        <div class="flex items-center">
            <input type="checkbox" name="is_published" id="is_published" class="h-4 w-4 text-blue-600 border-gray-300 rounded"
                   {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
            <label for="is_published" class="ml-2 text-sm text-gray-700">Publikasikan sekarang</label>
        </div>

        <!-- Submit -->
        <div class="pt-4">
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.post.index') }}"
                class="ml-3 text-gray-600 hover:text-gray-800 text-sm">Batal</a>
        </div>
    </form>
</div>
@endsection
