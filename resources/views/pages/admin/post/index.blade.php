@extends('layouts.admin.app')

@section('title', 'Daftar Postingan Blog')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.post.create') }}"
       class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all">
        <i class="fas fa-plus mr-1"></i> Tambah Postingan
    </a>
</div>

@if (session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white shadow rounded-xl overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-100 text-gray-600">
            <tr>
                <th class="px-6 py-3 text-left font-medium">Judul</th>
                <th class="px-6 py-3 text-left font-medium">Slug</th>
                <th class="px-6 py-3 text-left font-medium">Publish</th>
                <th class="px-6 py-3 text-center font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($posts as $post)
                <tr>
                    <td class="px-6 py-4">{{ $post->title }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $post->slug }}</td>
                    <td class="px-6 py-4">{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->translatedFormat('d M Y') : '-' }}</td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="{{ route('admin.post.edit', $post->id) }}"
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs">
                            Edit
                        </a>
                        <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus postingan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada postingan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
